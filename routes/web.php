<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', [ServiceController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::post('/s_service', [ServiceController::class, 'store']);

Route::get('/dashboard/{id}/edit', [ServiceController::class,'edit']);

Route::put('/dashboard/{id}', [ServiceController::class,'update']);

Route::delete('/dashboard/{id}', [ServiceController::class,'destroy']);




Route::get('/appointments', [AppointmentController::class, 'appointmentindex'])
    ->middleware(['auth'])
    ->name('appointment');

Route::post('/a_appointment', [AppointmentController::class, 'appointmentstore']);

Route::get('/appointments/{id}/edit', [AppointmentController::class,'appointmentedit']);

Route::put('/appointments/{id}', [AppointmentController::class,'appointmentupdate']);

Route::delete('/appointments/{id}', [AppointmentController::class,'appointmentdestroy']);



Route::get('/payments', [PaymentController::class, 'paymentindex'])
    ->middleware(['auth'])
    ->name('payment');

Route::post('/p_payments', [PaymentController::class, 'paymentstore']);

Route::post('/payments/{appointment}/pay', [PaymentController::class, 'payAppointment'])
    ->middleware(['auth'])
    ->name('payment.pay');


require __DIR__.'/auth.php';