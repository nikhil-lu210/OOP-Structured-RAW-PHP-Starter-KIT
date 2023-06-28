<?php

use App\Controllers\Home\HomeController;
use App\Services\Route;

Route::get('/', HomeController::class, 'index')->name('home.index');
