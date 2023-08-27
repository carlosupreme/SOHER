<?php

use App\Http\Controllers\WorkController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', static fn() => view('dashboard'))->name('dashboard');
    Route::get('/dashboard', static fn() => redirect()->route('dashboard'));

    Route::get('/usuarios', static fn() => view('user.index'))->middleware('can:user.index')->name('user.index');

    Route::get('/usuarios/{user}', static fn($user) => view('user.show', ['user' => User::with('roles')->select(['id', 'name', 'email', 'phone', 'profile_photo_path'])->findOrFail($user)]))->name('user.show');

    Route::resource('/trabajos', WorkController::class)->except('store', 'destroy', 'update')->names('work');

    Route::get('/mis-trabajos', [WorkController::class, 'myworks'])->middleware('can:work.myworks')->name('work.myworks');

    Route::get('/asignadas', [WorkController::class, 'assignedIndex'])->middleware('can:work.assigned')->name('work.assigned-index');

    Route::get('/asignadas/{work}', [WorkController::class, 'assignedShow'])->middleware('can:work.assigned')->name('work.assigned-show');

    Route::get('/asginar/{work}', [WorkController::class, 'assign'])->middleware('can:work.assign')->name('work.assign');

    Route::fallback(static function () {
        abort(404);
    });
});
