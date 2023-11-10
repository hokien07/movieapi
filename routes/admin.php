<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::get('/okie', function () {
        echo 'okie';
    });
});
