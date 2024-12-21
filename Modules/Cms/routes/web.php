<?php

use Illuminate\Support\Facades\Route;
use Modules\Cms\Http\Controllers\CmsController;

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

Route::resource('cms', CmsController::class)->names('cms');

