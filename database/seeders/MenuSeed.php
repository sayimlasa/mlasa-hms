<?php

namespace Database\Seeders;

use App\Models\master\Menu;
use App\Models\master\Permission;
use App\Models\master\Submenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
        [
            'label' => 'Main Masters', 'icon' => 'ri-settings-2-line', 'module' => 'admin',
            'subs' => [
                ['label' => 'Company Setting', 'route' => 'company.settings'],
                ['label' => 'Users', 'route' => 'users'],
                ['label' => 'Roles', 'route' => 'roles'],
                ['label' => 'Branches', 'route' => 'branches'],
                ['label' => 'Locations', 'route' => 'locations'],
                ['label' => 'Currencies', 'route' => 'currencies'],
                ['label' => 'Tax Categories', 'route' => 'tax.categories'],
                ['label' => 'Doctor Types', 'route' => 'doctor.types'],
                ['label' => 'Modules', 'route' => 'modules'],
                ['label' => 'Wings', 'route' => 'wings'],
                ['label' => 'Wards', 'route' => 'wards'],
                ['label' => 'Rooms', 'route' => 'rooms'],
                ['label' => 'Beds', 'route' => 'beds'],
                ['label' => 'Suppliers', 'route' => 'suppliers'],
                ['label' => 'Auth Codes', 'route' => 'auth.codes'],
                ['label' => 'Triages', 'route' => 'triages'],
                ['label' => 'Doctor Rooms', 'route' => 'doctor.rooms'],
                ['label' => 'Payment Methods', 'route' => 'payment.methods'],
                ['label' => 'Machine', 'route' => 'machines'],
                ['label' => 'Document Types', 'route' => 'document.types'],
                ['label' => 'Disease code versions', 'route' => 'disease.code.versions'],
                ['label' => 'Disease codes', 'route' => 'disease.codes'],
                ['label' => 'Form fields', 'route' => 'form.fields'],
            ],
            'permissions' => [
                //users
                ['label' => 'Add user', 'action' => Permission::add_user, 'description' => 'Add user', 'group' => 'user'],
                ['label' => 'Edit user', 'action' => Permission::edit_user, 'description' => 'Edit user', 'group' => 'user'],
                ['label' => 'Reset password', 'action' => Permission::reset_password, 'description' => 'Reset user password', 'group' => 'user'],
                //roles
                ['label' => 'Add role', 'action' => Permission::add_role, 'description' => 'Add role', 'group' => 'role'],
                ['label' => 'Edit role', 'action' => Permission::edit_role, 'description' => 'Edit role', 'group' => 'role'],
                //branches
                ['label' => 'Add branch', 'action' => Permission::add_branch, 'description' => 'Add branch', 'group' => 'branch'],
                ['label' => 'Edit branch', 'action' => Permission::edit_branch, 'description' => 'Edit branch', 'group' => 'branch'],
                //locations
                ['label' => 'Add location', 'action' => Permission::add_location, 'description' => 'Add location', 'group' => 'location'],
                ['label' => 'Edit location', 'action' => Permission::edit_location, 'description' => 'Edit location', 'group' => 'location'],
                //doctor types
                 
            ],
        ]
        ];
        foreach ($menus as $mindex => $m) {
            $subs = $m['subs'];
            $permissions = $m['permissions'];
            unset($m['subs'], $m['permissions']);

            $m['sortno'] = $mindex;
            $menu = Menu::query()->create($m);
            //submenus
            foreach ($subs as $sindex => $sub) {
                $sub['menuid'] = $menu->id;
                $sub['sortno'] = $sindex;
                Submenu::query()->create($sub);
            }
            //permissions
            foreach ($permissions as $pindex => $perm) {
                $perm['menuid'] = $menu->id;
                $perm['sortno'] = $pindex;
                Permission::query()->create($perm);
            }
        }
    }
}
