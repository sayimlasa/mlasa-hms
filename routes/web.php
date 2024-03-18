<?php
use App\Http\Controllers\master\BranchesController;
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
   // return view('welcome');
})->middleware('auth');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//users
Route::get('/user',[UsersController::class,'index'])->name('users.list');
Route::get('/create-user',[UsersController::class,'create'])->name('user.create');
Route::get('/edit-user/{id}',[UsersController::class,'edit'])->name('user.edit');
Route::post('/save-user',[UsersController::class,'store'])->name('user.save');
Route::post('/delete/{id}',[UsersController::class,'destroy'])->name('user.destroy');
//roles
Route::get('/roles',[RolesController::class,'index'])->name('roles');
Route::get('/create-role/{replicateid?}', [RolesController::class, 'create'])->name('roles.create');
Route::get('/edit-role/{roleid}', [RolesController::class, 'create'])->name('role.edit');;
Route::post('/roles/post',[RolesController::class,'store'])->name('roles.store');
Route::delete('/delete-role/{roleid}', [RolesController::class, 'destroy'])->name('role.delete');
//branches

//wings
Route::resource('wing', WingsController::class);
Route::resource('ward', WardsController::class);

//new route
Route::get('/branch',[BranchesController::class,'index'])->name('branch.list');
Route::get('/branch/create',[BranchesController::class,'createbranch'])->name('branch.create');
Route::get('/branch/edit/{id}',[BranchesController::class,'edit'])->name('branch.edit');
Route::post('/branch/save',[BranchesController::class,'store'])->name('branch.save');
Route::post('/branch/update/{id}',[BranchesController::class,'update'])->name('branch.update');

//location
Route::get('/location',[App\Http\Controllers\master\LocationController::class,'index'])->name('location');
Route::get('/location/create',[App\Http\Controllers\master\LocationController::class,'create'])->name('location.create');
Route::post('/location/store',[App\Http\Controllers\master\LocationController::class,'store'])->name('location.save');
Route::get('/location/edit/{id}',[App\Http\Controllers\master\LocationController::class,'edit'])->name('location.edit');
Route::post('/location/update/{id}',[App\Http\Controllers\master\LocationController::class,'update'])->name('location.update');
//select
Route::get('select2',[App\Http\Controllers\Select2Controller::class,'index'])->name('select2.index');
