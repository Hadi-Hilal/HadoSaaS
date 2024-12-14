<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Base::Index', [
        'test_val' => 'Prop value'
    ]);
});
