<?php
use Illuminate\Support\Facades\Route;
use Modules\Base\Http\Controllers\Admin\SettingsController;


Route::resource('settings', SettingsController::class)->only('index', 'store')->middleware('can:Settings Management');
