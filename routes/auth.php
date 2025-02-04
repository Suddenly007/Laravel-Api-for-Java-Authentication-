<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [App\Http\Controllers\Api\Auth\LoginController::class, '__invoke']);
Route::post('logout', [App\Http\Controllers\Api\Auth\LogoutController::class, '__invoke']);
Route::post('register', [App\Http\Controllers\Api\Auth\RegisterController::class, '__invoke']);