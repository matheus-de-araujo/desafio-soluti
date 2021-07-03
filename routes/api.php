<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AuthenticateController;

Route::post('login', [AuthenticateController::class, 'login'])->name('login');

Route::post('user-store', [UserController::class, 'store'])->name('user-store');

Route::middleware('auth:api')->group( function () {
  
  Route::apiResource('user', UserController::class);
  
  Route::post('logout', [AuthenticateController::class, 'logout'])->name('logout');

  Route::apiResource('certificate', CertificateController::class);

});