<?php

use App\Http\Controllers\Cms\BidangController;
use App\Http\Controllers\Cms\GalleryController;
use App\Http\Controllers\Cms\NewsController;
use App\Http\Controllers\Cms\ProfileController;
use App\Http\Controllers\Cms\SliderController;
use App\Http\Controllers\Cms\TabloidController;
use App\Http\Controllers\Cms\UserController;
use App\Http\Controllers\Cms\VideoController;
use App\Http\Controllers\Cms\WebSettingController;
use Illuminate\Support\Facades\Route;

Route::prefix("cms/")->middleware("auth")->group(function () {
  Route::get('/dashboard', function () {
    return view('cms.dashboard', ['title' => "Dashboard"]);
  })->name('cms.dashboard');

  Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('cms.profile.edit');
    Route::patch('/profile', 'update')->name('cms.profile.update');
    Route::delete('/profile', 'destroy')->name('cms.profile.destroy');
  });

  Route::resource('berita', NewsController::class)->names([
    'index' => 'cms.news.index',
    'create' => 'cms.news.create',
    'store' => 'cms.news.store',
    'edit' => 'cms.news.edit',
    'update' => 'cms.news.update',
    'show' => 'cms.news.show',
    'destroy' => 'cms.news.destroy',
  ]);

  Route::middleware("auth:root,operator")->group(function () {
    Route::resource('bidang', BidangController::class)->except(["show"])->names([
      'index' => 'cms.bidang.index',
      'create' => 'cms.bidang.create',
      'store' => 'cms.bidang.store',
      'edit' => 'cms.bidang.edit',
      'update' => 'cms.bidang.update',
      'destroy' => 'cms.bidang.destroy',
    ]);

    Route::resource("users", UserController::class)->except(["show"])->names([
      'index' => 'cms.users.index',
      'create' => 'cms.users.create',
      'store' => 'cms.users.store',
      'edit' => 'cms.users.edit',
      'update' => 'cms.users.update',
      'destroy' => 'cms.users.destroy',
    ]);

    Route::resource("gallery", GalleryController::class)->names([
      'index' => 'cms.gallery.index',
      'create' => 'cms.gallery.create',
      'store' => 'cms.gallery.store',
      'edit' => 'cms.gallery.edit',
      'update' => 'cms.gallery.update',
      'show' => 'cms.gallery.show',
      'destroy' => 'cms.gallery.destroy',
    ]);

    Route::resource('tabloid', TabloidController::class)->names([
      'index' => 'cms.tabloid.index',
      'create' => 'cms.tabloid.create',
      'store' => 'cms.tabloid.store',
      'edit' => 'cms.tabloid.edit',
      'update' => 'cms.tabloid.update',
      'show' => 'cms.tabloid.show',
      'destroy' => 'cms.tabloid.destroy',
    ]);

    Route::resource("video", VideoController::class)->except(["show"])->names([
      'index' => 'cms.video.index',
      'create' => 'cms.video.create',
      'store' => 'cms.video.store',
      'edit' => 'cms.video.edit',
      'update' => 'cms.video.update',
      'destroy' => 'cms.video.destroy',
    ]);

    Route::prefix("settings")->group(function () {
      Route::resource("slider", SliderController::class)->names([
        'index' => 'cms.slider.index',
        'create' => 'cms.slider.create',
        'store' => 'cms.slider.store',
        'edit' => 'cms.slider.edit',
        'update' => 'cms.slider.update',
        'show' => 'cms.slider.show',
        'destroy' => 'cms.slider.destroy',
      ]);
      Route::controller(WebSettingController::class)->group(function () {
        Route::get('/web-setting', 'edit')->name('cms.web_setting.edit');
        Route::put('/web-setting', 'update')->name('cms.web_setting.update');
      });
    });
  });
});
