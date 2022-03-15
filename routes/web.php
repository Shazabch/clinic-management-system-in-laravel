<?php

use App\Http\Controllers\attachmentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\patientController;
use App\Http\Controllers\vitalsController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/patient/create',[patientController::class,'create'])->name('patient.create');
Route::post('/patient/store',[patientController::class,'store'])->name('patient.store');
Route::get('/patient/{id}/edit',[patientController::class,'edit'])->name('patient.edit');
Route::put('/patient/{id}',[patientController::class,'update'])->name('patient.update');
Route::delete('/patient/{id}',[patientController::class,'destroy'])->name('patient.destroy');


//routes for the vitals
Route::get('/vitals/create/{id}',[vitalsController::class,'create'])->name('vitals.create');
Route::post('/vitals/store/{id}',[vitalsController::class,'store'])->name('vitals.store');
Route::get('/vitals/show/{id}',[vitalsController::class,'show'])->name('vitals.show');

//Routes For attachments
Route::get('/attachment/{id}',[attachmentController::class,'attachment'])->name('attachment.display');
Route::post('/attachment/upload/{id}',[attachmentController::class,'upload'])->name('attachment.upload');
Route::get('/attachment/download/{id}',[attachmentController::class,'download'])->name('attachment.download');
Route::get('destroy/{id}',[attachmentController::class,'destroy'])->name('attachment.destroy');
