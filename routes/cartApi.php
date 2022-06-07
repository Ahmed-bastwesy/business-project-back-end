<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| CARTAPI Routes
|--------------------------------------------------------------------------
|
| Here is where you can register CARTAPI routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "CARTAPI" middleware group. Enjoy building your CARTAPI!
|
// */


Route::group(["middleware"=>['api','auth:sanctum']],function (){

    Route::get("/{userId}",[CartController::class,'index']);
    Route::post("/{userId}/{productId}",[CartController::class,'addToCart']);
    Route::delete("/{userId}/{productId}",[CartController::class,'removeFromCart']);
    
});