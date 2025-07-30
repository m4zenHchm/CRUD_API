<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;

//POST
Route::post('/register', [AuthController::class, 'register']);

//GET
Route::get('/users', [AuthController::class, 'index']);
Route::get('/users/{id}', [AuthController::class, 'show']);

//PUT
Route::put('/users/{id}', [AuthController::class, 'update']);

//DELETE
Route::delete('/users/{id}', [AuthController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
