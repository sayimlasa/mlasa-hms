<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\master\BedsController;
use App\Http\Controllers\master\BranchesController;
use App\Http\Controllers\master\DoctorTypeController;
use App\Http\Controllers\master\RolesController;
use App\Http\Controllers\master\RoomsController;
use App\Http\Controllers\master\UsersController;
use App\Http\Controllers\Master\WingsController;
use App\Http\Controllers\Master\WardsController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\reception\Appointment;
use App\Http\Controllers\reception\PatientController;
use App\Http\Controllers\reception\ReceptionController;
use App\Http\Controllers\TechnicianController;
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
Route::get('/admin',[AdminController::class,'index'])->name('admin')->middleware('admin');
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
//room
Route::get('/room',[RoomsController::class,'index'])->name('room');
Route::get('/room/create',[RoomsController::class,'create'])->name('room.create');
Route::get('/room/edit/{id}',[RoomsController::class,'edit'])->name('room.edit');
Route::post('/room/save',[RoomsController::class,'store'])->name('room.save');
Route::post('/delete/room',[RoomsController::class,'destroy'])->name('room.destroy');

//bed
Route::get('/bed',[BedsController::class,'index'])->name('bed');
Route::get('/bed/create',[BedsController::class,'create'])->name('bed.create');
Route::get('/bed/edit/{id}',[BedsController::class,'edit'])->name('bed.edit');
Route::post('/bed/save',[BedsController::class,'store'])->name('bed.save');
Route::post('/bed/destroy/{id}',[BedsController::class,'destroy'])->name('bed.destroy');

//branch
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

//reception
Route::get('/receptionist',[ReceptionController::class,'reception'])->name('reception')->middleware('receptionist');
Route::get('/patient/list',[PatientController::class,'index'])->name('patient');
Route::get('/create/patient',[PatientController::class,'create'])->name('patient.create');
Route::get('/patient/edit/{id}',[PatientController::class,'edit'])->name('patient.edit');
Route::post('/patient/store',[PatientController::class,'store'])->name('patient.save');
Route::post('/patient/update/{id}',[PatientController::class,'store'])->name('patient.update');
Route::post('/patient/delete/{id}',[PatientController::class,'destroy'])->name('patient.destroy');
Route::get('/patient/{id}',[PatientController::class,'view'])->name('patient.view');
Route::get('appoint',[Appointment::class,'index'])->name('appointment');
Route::post('/consultation',[Appointment::class,'consultation'])->name('radio');
//doctor
Route::get('/doctor',[DoctorController::class,'index'])->name('doctor.index')->middleware('doctor');
//reception
 Route::get('/pharmacist',[PharmacyController::class,'index'])->name('pharmacist.index')->middleware('pharmacist');
//Technician
Route::get('/technician',[TechnicianController::class,'index'])->name('technician.index')->middleware('technician');
//nurse
Route::get('/nurse',[NurseController::class,'index'])->name('nurse.index')->middleware('nurse');
 //select
Route::get('select2',[App\Http\Controllers\Select2Controller::class,'index'])->name('select2.index');

//doctor type
Route::get('/doctortype/',[DoctorTypeController::class,'index'])->name('doctor.type');
Route::get('/doctortype/create',[DoctorTypeController::class,'create'])->name('doctor.type.create');
Route::get('/doctortype/edit/{id}',[DoctorTypeController::class,'edit'])->name('doctor.type.edit');
Route::post('/doctortype/save',[DoctorTypeController::class,'store'])->name('doctor.type.store');

