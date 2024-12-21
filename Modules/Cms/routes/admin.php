<?php

use Illuminate\Support\Facades\Route;
use Modules\Cms\Http\Controllers\Admin\PageController;


Route::middleware('can:CMS Management')->group(function () {

    Route::delete('pages/deleteMulti', [PageController::class, 'deleteMulti'])->name('pages.deleteMulti');
    Route::resource('pages', PageController::class)->except(['destroy', 'show']);
});
