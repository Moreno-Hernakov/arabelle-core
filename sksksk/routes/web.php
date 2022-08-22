<?php

use Illuminate\Support\Facades\Route;
use App\Models\myMod;
// use App\Http\Controllers\UpdatemyModRequest;
use App\Http\Controllers\MyModelController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\LoginController;




// Handled by blade from laravel ================================================

Route::resource('/home', MyModelController::class)->middleware('auth');
// Route::get('/vuejscrud', [MyModelController::class, 'viuu']);

Route::get('/', function(){
    return view('landingPage.index');
});

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/regis', [RegisController::class, 'index'])->middleware('guest');
Route::post('/regis', [RegisController::class, 'tampil']);



// Handled by Vue from JavaScript ================================================

    // Login Page
Route::get('/vuelog', function(){
    return view('vuejs.login.loginvue');
});

    // Regis Page
Route::get('/vuereg', function(){
    return view('vuejs.Regis.Regisvue');
});

    // Dashboard Page
Route::any('/{any}', function(){
    return view('newdashboard.newdashboard');
})->where('any', '.*');

// Route::any('/{slug}', function(){
//     return view('vuejs.dashboard.dashboardvue');
// });

