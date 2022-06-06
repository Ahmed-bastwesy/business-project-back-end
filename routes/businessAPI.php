<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {

    // category API
    Route::apiResource('category', CategoryController::class);

    // business API
    Route::apiResource('business', BusinessController::class);
});
