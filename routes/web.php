<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('website');

Route::prefix("cms/")->middleware("auth")->group(function () {
    Route::get('/dashboard', function () {
        return view('cms.dashboard', ['title' => "Dashboard"]);
    })->name('dashboard');

    Route::controller("ProfileController")->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller("BidangController")->group(function () {
        Route::get('/bidang', 'index')->name('bidang.index');
    });

    Route::controller("UserController")->group(function () {
        Route::get('/users', 'index')->name('users.index');
    });
});

require __DIR__ . '/auth.php';
