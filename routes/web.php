<?php

use App\Controllers\Home\HomeController;
use App\Services\Route;

// Route::get('/', HomeController::class, 'index')->name('home.index');

Route::prefix('')
    ->as('home')
    ->group(function () {
        Route::get('/', HomeController::class, 'index')->name('index');
        Route::get('/show/{id}', HomeController::class, 'show')->name('show');
    });