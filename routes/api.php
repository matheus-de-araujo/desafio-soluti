<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TelephoneController;

Route::apiResource('user', UserController::class);

Route::apiResource('telephone', TelephoneController::class);