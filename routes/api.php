<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('movie')->name('movie.')->group(function () {
    Route::get("/trend", [\App\Http\Controllers\Api\HomeApiController::class, 'trend'])->name('trend');
    Route::get("/popular", [\App\Http\Controllers\Api\HomeApiController::class, 'popular'])->name('popular');
    Route::get("/top-rate", [\App\Http\Controllers\Api\HomeApiController::class, 'topRate'])->name('top.rate');
    Route::get('/detail/{serverId}', [\App\Http\Controllers\Api\HomeApiController::class, 'detail'])->name('detail');
});
