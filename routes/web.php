<?php

use App\Http\Controllers\master\BranchController;
use App\Http\Controllers\master\RolesController;
use App\Http\Controllers\master\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//users
Route::get('/user',[UsersController::class,'index'])->name('users.list');
//roles
Route::get('/roles',[RolesController::class,'index'])->name('roles');
Route::get('/roles/create',[RolesController::class,'create'])->name('roles.create');
//branches
Route::get('/branch',[BranchController::class,'index'])->name('branches.list');