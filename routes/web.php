<?php
use App\Http\Controllers\master\BranchController;
use App\Http\Controllers\master\RolesController;
use App\Http\Controllers\master\UsersController;
use App\Http\Controllers\Master\WingsController;
use App\Http\Controllers\Master\WardsController;
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
Route::get('/create-role/{replicateid?}', [RolesController::class, 'create'])->name('roles.create');
Route::get('/edit-role/{roleid}', [RolesController::class, 'create'])->name('role.edit');;
Route::post('/roles/post',[RolesController::class,'store'])->name('roles.store');
Route::delete('/delete-role/{roleid}', [RolesController::class, 'destroy'])->name('role.delete');
//branches
Route::get('/branch',[BranchController::class,'index'])->name('branches');
Route::get('/branch/create/{id?}',[BranchController::class,'create'])->name('branches.create');
Route::post('/branch/store',[BranchController::class,'store'])->name('branches.store');
Route::post('/branch/destroy{id}',[BranchController::class,'destroy'])->name('branches.destroy');

//wings
Route::resource('wing', WingsController::class);
Route::resource('ward', WardsController::class);
