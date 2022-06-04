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

Route::get('/home',[HomeController::class,'home'])->name('admin.home');

Route::get('/',[AdminController::class,'user']);
Route::get('/admin',[AdminController::class,'admin']);


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
Route::get('/doctor/list',[DoctorController::class,'doctorList'])->name('doctor.list');
Route::get('/add',[DoctorController::class,'doctorAdd'])->name('doctor.add');
Route::post('/store',[DoctorController::class,'store'])->name('doctor.store');
Route::get('/status/{id}',[DoctorController::class,'changeStatus'])->name('doctor.status');

//appointment
