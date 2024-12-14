<?php

use Illuminate\Support\Facades\Route;
use Modules\Base\Http\Controllers\Admin\LogController;
use Modules\Base\Http\Controllers\Admin\SettingsController;

Route::resource('settings', SettingsController::class)->only('index', 'store')->middleware('can:Settings Management');


Route::delete('logs/deleteMulti', [LogController::class, 'deleteMulti'])->name('logs.deleteMulti')->middleware('can:Logs Management');
Route::resource('logs', LogController::class)->only('index', 'show')->middleware('can:Logs Management');
