<?php

use App\Controllers\Home\HomeController;
use App\Services\Route;

// Route::get('/', HomeController::class, 'index')->name('home.index');
// Route::get('/show/{id}/{slug}', HomeController::class, 'show')->name('home.show');

Route::prefix('')
    ->as('home')
    ->group(function () {
        Route::get('/', HomeController::class, 'index')->name('index');
        Route::get('/show/{id}/{slug}', HomeController::class, 'show')->name('show');
        Route::post('/store', HomeController::class, 'store')->name('store');
    });