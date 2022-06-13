<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::group(['prefix' => 'v1'], function(){
    
    Route::group(['prefix' => 'admin'], function(){
        Route::post('/add-items', [AdminController::class, "addItems"]); 
        Route::post('/add-categories', [AdminController::class, "addCategories"]); 
        Route::get('/items', [AdminController::class, "getItems"]); 
        Route::get('/users', [AdminController::class, "getUsers"]); 
        Route::get('/categories', [AdminController::class, "getCategories"]);
        Route::get('/login', [AdminController::class, "login"]); 
    });
    
    Route::group(['prefix' => 'user'], function(){
        Route::group(['middleware' => 'user.auth'], function(){
            Route::post('/like-items', [UserController::class, "likeItems"]); 
            Route::post('/logout', [JWTController::class, 'logout']);
            Route::post('/refresh', [JWTController::class, 'refresh']);
            Route::post('/profile', [JWTController::class, 'profile']);
        });
        Route::post('/register', [JWTController::class, 'register']);
        Route::get('/all-items', [UserController::class, "displayItems"]); 
        Route::get('/all-categories', [UserController::class, "displayCategories"]); 

        Route::get('/items', [UserController::class, "getItems"]); 
    });

    Route::post('/login', [JWTController::class, 'login']);
    Route::get('/not_found', [UserController::class, 'notFound'])->name("not-found");

});
