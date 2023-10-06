<?php

use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SpecializationController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotte api dottori
Route::apiResource('doctors', DoctorController::class);
Route::get('/doctors/specialization/{id}', [DoctorController::class, 'indexBySpecializations']);
Route::get('/doctors/specialization/{id}/{rating}', [DoctorController::class, 'indexBySpecializationsAndRating']);

Route::get('/braintree/client-token', 'BraintreeController@getClientToken');

// Rotte api specializzazioni
Route::apiResource('specializations', SpecializationController::class);

// Rotte api recensioni
Route::apiResource('reviews', ReviewController::class);
