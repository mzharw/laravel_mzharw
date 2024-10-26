<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HospitalController::class, 'index']);

    Route::resource('hospitals', HospitalController::class);
    Route::resource('patients', PatientController::class);
});