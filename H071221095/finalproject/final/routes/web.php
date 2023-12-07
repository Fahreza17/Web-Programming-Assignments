<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home' ,[HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/doctor_data_view',[AdminController::class, 'doctorview'])->middleware('auth')->name('doctor');
Route::get('/tambah_doctor',[AdminController::class, 'tambahandoctor'])->middleware('auth')->name('doctor');
Route::post('/upload_doctor', [AdminController::class, 'upload'])->middleware('auth')->name('upload.doctor');

Route::post('/upload_pasien', [AdminController::class, 'uploadpasien'])->middleware('auth')->name('upload.pasien');
Route::get('/pasien_data_view',[AdminController::class, 'pasienview'])->middleware('auth')->name('pasien');
Route::get('/tambah_pasien',[AdminController::class, 'tambahanpasien'])->middleware('auth')->name('pasien');

Route::post('/upload_apoteker', [AdminController::class, 'uploadapoteker'])->middleware('auth')->name('upload.apoteker');
Route::get('/apoteker_data_view',[AdminController::class, 'apotekerview'])->middleware('auth')->name('apoteker');
Route::get('/tambah_apoteker',[AdminController::class, 'tambahanapoteker'])->middleware('auth')->name('apoteker');

Route::post('/upload_appointment', [DoctorController::class, 'uploadappointment'])->middleware('auth')->name('upload.appointment');
Route::get('/appointment_data_view',[DoctorController::class, 'appointmentview'])->middleware('auth')->name('appointment');
Route::get('/tambah_appointment',[DoctorController::class, 'tambahappointment'])->middleware('auth')->name('appointment');

Route::get('/apoteker_data_view',[ApotekerController::class, 'apotekermentview'])->middleware('auth')->name('apoteker');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
