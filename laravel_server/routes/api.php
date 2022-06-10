<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


Route::group(['prefix' => 'admin'], function(){
    Route::post('/items', [AdminController::class, "addItems"]); 
    Route::post('/categories', [AdminController::class, "addCategories"]); 
    Route::get('/items', [AdminController::class, "getItems"]); 
    Route::get('/users', [AdminController::class, "getUsers"]); 
    Route::get('/categories', [AdminController::class, "getCategories"]); 
});

Route::group(['prefix' => 'user'], function(){
    Route::get('/items', [UserController::class, "getItems"]); 
    Route::post('/like-items', [UserController::class, "likeItems"]); 

    Route::group(['middleware' => 'api'], function($router) {
        Route::post('/register', [JWTController::class, 'register']);
        Route::post('/login', [JWTController::class, 'login']);
        Route::post('/logout', [JWTController::class, 'logout']);
        Route::post('/refresh', [JWTController::class, 'refresh']);
        Route::post('/profile', [JWTController::class, 'profile']);
    });

});