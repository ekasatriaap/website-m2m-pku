<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::controller(WebsiteController::class)->group(function () {
    Route::get("/", "index")->name("dashboard");
    Route::get("berita", "news")->name("news");
    Route::get("berita-detail/{slug}", "newsDetail")->name("news_detail");
    Route::get("madrasah", "madrasah")->name("madrasah");
    Route::get("komite", "komite")->name("komite");
    Route::get("struktural", "struktural")->name("struktural");
    Route::get("halaman/{slug}", "page")->name("page");
    Route::get("galeri", "gallery")->name("gallery");
    Route::get("video", "video")->name("video");
    Route::get("majalah", "majalah")->name("majalah");
    Route::get("informasi-ppdb", "informasiPPDB")->name("informasi_ppdb");
});

require __DIR__ . '/auth.php';
require __DIR__ . '/cms.php';
