<?php

use Illuminate\Support\Facades\Route;
use Modules\Base\Http\Controllers\Admin\LogController;
use Modules\Base\Http\Controllers\Admin\SeoController;
use Modules\Base\Http\Controllers\Admin\SettingsController;

// Group for Settings Management
Route::middleware('can:Settings Management')->group(function () {
    Route::resource('settings', SettingsController::class)->only(['index', 'store']);
    Route::resource('seo', SeoController::class)->only(['index', 'store']);
});

// Group for Logs Management
Route::middleware('can:Logs Management')->group(function () {
    Route::delete('logs/deleteMulti', [LogController::class, 'deleteMulti'])->name('logs.deleteMulti');
    Route::resource('logs', LogController::class)->only(['index', 'show']);
});
