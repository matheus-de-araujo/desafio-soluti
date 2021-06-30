<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\AddressController;

Route::apiResource('user', UserController::class);

Route::apiResource('telephone', TelephoneController::class);

Route::apiResource('address', AddressController::class);