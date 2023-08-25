<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('web')->group(function() {
    Route::get("/", [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');
    Route::get('/search', function () {});

    Route::prefix('the-loai')->group(function () {
        Route::get('/{slug}', [\App\Http\Controllers\Web\CatController::class, 'index'])->name('category');
    });

    Route::prefix('quoc-gia')->group(function () {
        Route::get('/{slug}', [\App\Http\Controllers\Web\CountryController::class, 'index'])->name('country');
    });

    Route::prefix('phim')->group(function () {
        Route::get('/{slug}', [\App\Http\Controllers\Web\MovieController::class, 'index'])->name('movie');
    });
});
