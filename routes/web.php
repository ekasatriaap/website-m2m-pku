<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::controller(WebsiteController::class)->group(function () {
    Route::get("/", "index")->name("dashboard");
});

require __DIR__ . '/auth.php';
require __DIR__ . '/cms.php';
