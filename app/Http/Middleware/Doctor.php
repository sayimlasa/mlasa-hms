<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Doctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->roleid == 1) {
            return redirect()->route('admin');
        }

        if (Auth::user()->roleid == 2) {
            return $next($request);
        }
        if (Auth::user()->roleid==3){
            return redirect()->route('pharmacist');
        }
        if (Auth::user()->roleid==4){
            return redirect()->route('nurse');
        }
        if (Auth::user()->roleid==6){
            return redirect()->route('accountant');
        }
        if (Auth::user()->roleid==5){
            return redirect()->route('technician');
        }
        if (Auth::user()->roleid==7){
            return redirect()->route('receptionist');
        }
    }
}
