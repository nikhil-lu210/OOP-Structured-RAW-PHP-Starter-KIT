<?php

use App\Services\Route;
use App\Controllers\Home\HomeController;
use App\Controllers\Migrations\MigrationController;

Route::get('/migration/create', MigrationController::class, 'create')->name('migration.create');
// Route::get('/show/{id}/{slug}', HomeController::class, 'show')->name('home.show');

Route::prefix('')
    ->as('home')
    ->group(function () {
        Route::get('/', HomeController::class, 'index')->name('index');
        Route::get('/show/{id}/{slug}', HomeController::class, 'show')->name('show');
        Route::post('/store', HomeController::class, 'store')->name('store');
    });