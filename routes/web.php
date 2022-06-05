<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home',[HomeController::class,'home'])->name('home');

Route::get('/',[AdminController::class,'user']);
Route::get('/admin',[AdminController::class,'admin'])->name('admin.home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Doctor
Route::get('/doctor/all',[HomeController::class,'doctors'])->name('doctor.all');
Route::get('/doctor/list',[DoctorController::class,'doctorList'])->name('doctor.list');
Route::get('/add',[DoctorController::class,'doctorAdd'])->name('doctor.add');
Route::get('/status/{id}',[DoctorController::class,'changeStatus'])->name('doctor.status');
Route::post('/add/doctorinfoStore',[DoctorController::class,'storeDoctorInfo'])->name('doctorInfoStore');
Route::get('/edit/{id}',[DoctorController::class,'editDoctor'])->name('doctor.edit');
Route::put('/update/{id}',[DoctorController::class,'updateDoctor'])->name('doctor.update');
Route::get('/delete/{id}',[DoctorController::class,'deleteDoctor'])->name('deleteDoctor');
Route::get('/view/{id}',[DoctorController::class,'viewDoctor'])->name('viewDoctor');


//appointment
Route::get('/myAppointment',[HomeController::class,'myAppointment'])->name('myAppointment');
Route::post('/store/appointment',[HomeController::class,'appointmentStore'])->name('appointment.store');
Route::get('/myAppointment/cancleAppointment/{id}',[HomeController::class,'cancleAppointment'])->name('cancleAppointment');
Route::get('/showAppointmentsList',[AdminController::class,'showAppointments'])->name('showAppointments');
Route::get('/approved/{id}',[AdminController::class,'approvedStatus'])->name('approvedStatus');
Route::get('/cancled/{id}',[AdminController::class,'cancledStatus'])->name('cancledStatus');