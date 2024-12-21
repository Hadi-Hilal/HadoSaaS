<?php

use Illuminate\Support\Facades\Route;
use Modules\Support\Http\Controllers\SupportController;

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

Route::resource('support', SupportController::class)->names('support');

