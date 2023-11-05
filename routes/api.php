<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\WorkApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('auth/register', [AuthApiController::class, 'create']);
Route::post('auth/login', [AuthApiController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/works', WorkApiController::class)->names('work');
    Route::get('auth/logout', [AuthApiController::class, 'logout']);
});

