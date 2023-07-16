<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        app()->setLocale('es');
        return view('dashboard');
    })->name('dashboard');
});
