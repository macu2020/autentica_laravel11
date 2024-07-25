<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\DashboardController;  



 

Route::GET('/', [HomeController::class, 'index']); 
Route::GET('/registra', [AuthController::class, 'getregistro']);
Route::POST('/registra', [AuthController::class, 'postregistro']);

Route::GET('/login', [AuthController::class, 'login']);
Route::POST('/login', [AuthController::class, 'login_post']);
Route::GET('/forget', [AuthController::class, 'forget']); 
Route::POST('/forget', [AuthController::class, 'forget_post']); 

//Resetar password
Route::GET('/reset/{token}', [AuthController::class, 'getReset']); 
Route::POST('/reset/{token}', [AuthController::class, 'postReset']);  


Route::group(['middleware' => 'superadmin'], function(){
    Route::GET('superadmin/dashboard', [DashboardController::class, 'dashboard']);
});
Route::group(['middleware' => 'admin'], function(){
    Route::GET('admin/dashboard', [DashboardController::class, 'dashboard']);
});
Route::group(['middleware' => 'user'], function(){
    Route::GET('user/dashboard', [DashboardController::class, 'dashboard']);
});

Route::GET('logout', [AuthController::class, 'logout']); 







