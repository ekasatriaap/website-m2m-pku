<?php

use App\Http\Controllers\Cms\BidangController;
use App\Http\Controllers\Cms\GalleryController;
use App\Http\Controllers\Cms\MenuController;
use App\Http\Controllers\Cms\NewsController;
use App\Http\Controllers\Cms\PagesController;
use App\Http\Controllers\Cms\ProfileController;
use App\Http\Controllers\Cms\SettingBerandaWebController;
use App\Http\Controllers\Cms\SliderController;
use App\Http\Controllers\Cms\TabloidController;
use App\Http\Controllers\Cms\TestimoniController;
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

    Route::resource("pages", PagesController::class)->names([
      'index' => 'cms.pages.index',
      'create' => 'cms.pages.create',
      'store' => 'cms.pages.store',
      'edit' => 'cms.pages.edit',
      'update' => 'cms.pages.update',
      'show' => 'cms.pages.show',
      'destroy' => 'cms.pages.destroy',
    ]);

    Route::resource("testimoni", TestimoniController::class)->names([
      'index' => 'cms.testimoni.index',
      'create' => 'cms.testimoni.create',
      'store' => 'cms.testimoni.store',
      'edit' => 'cms.testimoni.edit',
      'update' => 'cms.testimoni.update',
      'show' => 'cms.testimoni.show',
      'destroy' => 'cms.testimoni.destroy',
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
      Route::controller(SettingBerandaWebController::class)->group(function () {
        Route::get('/setting-beranda-web', 'edit')->name('cms.setting_beranda_web.edit');
        Route::put('/setting-beranda-web', 'update')->name('cms.setting_beranda_web.update');
      });
      Route::resource("menu", MenuController::class)->names([
        'index' => 'cms.menu.index',
        'create' => 'cms.menu.create',
        'store' => 'cms.menu.store',
        'edit' => 'cms.menu.edit',
        'update' => 'cms.menu.update',
        'destroy' => 'cms.menu.destroy',
      ]);
      Route::controller(MenuController::class)->group(function () {
        Route::post('/menu/update-order', 'updateOrder')->name('cms.menu.updateOrder');
      });
    });
  });
});
