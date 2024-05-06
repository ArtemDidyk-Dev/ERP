<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\UserController;

Route::group(['middleware' => 'guest'], function () {

    Route::group(['prefix' => 'register'], function () {
        Route::get('/', [RegisterController::class, 'create'])->name('register.create');
        Route::post('/', [RegisterController::class, 'store'])->name('register.store');
    });

    Route::group(['prefix' => 'login'], function () {
        Route::get('/', [LoginController::class, 'show'])->name('login');
        Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate');
    });

});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', IndexController::class)->name('index');

    Route::group(['prefix' => 'cabinet'], function () {
        Route::resource('analytics', AnalyticsController::class);
    });

    Route::group(['middleware' => 'add.employee', 'prefix' => "employee"], function () {
        Route::get('/', [UserController::class, 'index'])->name('employee.index');
        Route::post('/store/{user}', [UserController::class, 'store'])->name('employee.store');
    });


});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');
