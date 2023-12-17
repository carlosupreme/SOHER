<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\WorkApiController;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('auth/register', [AuthApiController::class, 'create']);
Route::post('auth/login', [AuthApiController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/works', WorkApiController::class)->names('work');
    Route::get('auth/logout', [AuthApiController::class, 'logout']);
});

