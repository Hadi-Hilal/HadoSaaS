<?php

use Illuminate\Support\Facades\Route;
use Modules\Support\app\Http\Controllers\Admin\ContactFormController;
use Modules\Support\app\Http\Controllers\Admin\SubscriberController;


Route::middleware('can:Support Management')->group(function () {
    // Subscriber routes
    Route::delete('subscribers', [SubscriberController::class, 'deleteMulti'])->name('subscribers.deleteMulti');
    Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');

    // Contact form routes
    Route::delete('contact_forms', [ContactFormController::class, 'deleteMulti'])->name('contact_forms.deleteMulti');
    Route::get('contact_forms', [ContactFormController::class, 'index'])->name('contact_forms.index');
});
