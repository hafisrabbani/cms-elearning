<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\MainController as AuthController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::post('login', [AuthController::class, 'login'])->name('api.auth.login');
        Route::middleware('auth')->group(function(){
            Route::get('/me', [AuthController::class, 'me'])->name('api.auth.me');
        });
        Route::get('me', [AuthController::class, 'me'])->name('api.auth.me');
    });
});

