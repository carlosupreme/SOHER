<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', static function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/usuarios', static function () {
        return view('user.index');
    })->middleware('can:user.index')->name('user.index');

    Route::fallback(static function () {
        abort(404);
    });
});
