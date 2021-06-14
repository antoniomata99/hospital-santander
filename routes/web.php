<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

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

/*
Route::get('/prueba', function () {
    return view('patient');
});
*/

//Route::get('/patient', [AppointmentController::class, 'create']);

//Route::get('/patient/', [AppointmentController::class, 'validateRemision']);

Route::resource('patient', PatientController::class);

// Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
