<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\MidtransCallbackController;
use App\Http\Controllers\API\TransactionController;
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

// Public API
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{event}', [EventController::class, 'show']);
Route::get('/events/{event}/tickets', [EventController::class, 'tickets']);

// Midtrans Callback
Route::post('/callback', [MidtransCallbackController::class, 'callback']);

// Auth API
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/update-fcm-token', [AuthController::class, 'updateFirebaseToken']);

    // Transaction
    Route::post('/transaction', [TransactionController::class, 'order']);
    Route::get('/transactions', [TransactionController::class, 'transactions']);
    Route::get('/transaction/{transaction}', [TransactionController::class, 'show']);
});
