<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

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
// Route::post("/{id}/{id}",function(){
//     return response()->json('hhhhhhhhh');
// });

Route::group(["middleware"=>['api']],function (){

    Route::post("/{userId}/{productId}",function(){
            



        
    });
});