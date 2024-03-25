<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return string
     */
    protected function redirectTo(): string
    {
        if( Auth::user()->roleid==1){
            return RouteServiceProvider::ADMIN;
        } else if(Auth::user()->roleid ==2){
            return RouteServiceProvider::DOCTOR;
        }
        else if(Auth::user()->roleid==7){
            return RouteServiceProvider::RECEPTIONIST;
        }
        else if(Auth::user()->roleid==4){
            return RouteServiceProvider::NURSE;
        }
        else if(Auth::user()->roleid==3){
            return RouteServiceProvider::PHARMACIST;
        }
        else if (Auth::user()->roleid==5){
            return RouteServiceProvider::TECHNICIAN;
        }
        else{
            return redirect()->route('login');
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
