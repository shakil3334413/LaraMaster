<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/',[IndexController::class,'index']);
Route::get('/show',[IndexController::class,'show']);
Route::resource('/listing',ListingController::class);
Route::get('login', [AuthController::class, 'create'])
        ->name('login');
Route::post('login', [AuthController::class, 'store'])
        ->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])
        ->name('logout');
