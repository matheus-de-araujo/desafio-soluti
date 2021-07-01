<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AuthenticateController;

Route::apiResource('certificate', CertificateController::class);

Route::get('login', [AuthenticateController::class, 'login'])->name('login');

Route::post('user', [UserController::class, 'store']);

Route::middleware('auth:api')->group( function () {
  
  Route::apiResource('user', UserController::class)->except(['store']);
  
  Route::post('logout', [AuthenticateController::class, 'logout'])->name('logout');

});