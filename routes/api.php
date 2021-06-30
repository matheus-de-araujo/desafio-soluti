<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CertificateController;

Route::apiResource('user', UserController::class);

Route::apiResource('telephone', TelephoneController::class);

Route::apiResource('address', AddressController::class);

Route::apiResource('certificate', CertificateController::class);