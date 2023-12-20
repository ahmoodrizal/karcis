<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('layouts.x-app');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'ensureRole:admin'])->prefix('admin')->name('admin.')->group(function () {

    // User Area
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    // Event Area
    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('/create', [EventController::class, 'create'])->name('create');
        Route::get('/{event:slug}', [EventController::class, 'show'])->name('show');
        Route::get('/{event:slug}/edit', [EventController::class, 'edit'])->name('edit');
        Route::put('/{event:slug}', [EventController::class, 'update'])->name('update');
        Route::post('/', [EventController::class, 'store'])->name('store');
        Route::post('/{event:slug}/toggle', [EventController::class, 'toogleStatus'])->name('toogleStatus');
    });

    // Ticket Area
    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', [TicketController::class, 'index'])->name('index');
        Route::get('/{event:slug}/create', [TicketController::class, 'create'])->name('create');
        Route::get('/{ticket:code}/edit', [TicketController::class, 'edit'])->name('edit');
        Route::put('/{ticket:code}', [TicketController::class, 'update'])->name('update');
        Route::post('/{event:slug}', [TicketController::class, 'store'])->name('store');
    });
});

require __DIR__ . '/auth.php';
