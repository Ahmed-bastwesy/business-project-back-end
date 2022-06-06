<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {

    // users API
    Route::post('user/byRole', [UserController::class, 'getByRole']);
    Route::apiResource('user', UserController::class);

});
