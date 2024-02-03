<?php

namespace App\Providers;

use App\Models\master\RoleMenu;
use App\Models\master\RolePermission;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //allow admins
        Gate::before(function (User $user, string $ability) {
            if ($user->isAdmin) return true;
        });

        Gate::define('action', function (User $user, $action = "") {
            if (empty($action)) {//route authorization
                $allowed = RoleMenu::list()->where('rm.roleid', $user->roleid)->where('s.route', Route::currentRouteName())->count() > 0;
            } else {//action authorization
                $allowed = RolePermission::list()->where('rp.roleid', $user->roleid)->where('p.action', $action)->count() > 0;
            }

            $message = "System is working fine but ";
            if (!$allowed) {
                $message .= empty($action) ? "you are not allowed to access this page" : "you don't have permission to $action";
            }

            return $allowed
                ? Response::allow()
                : Response::deny($message);
        });
    }
}
