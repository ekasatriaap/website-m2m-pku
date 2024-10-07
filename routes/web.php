<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Home');
})->name('website');

require __DIR__ . '/auth.php';
require __DIR__ . '/cms.php';
