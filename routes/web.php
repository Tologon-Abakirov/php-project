<?php

// routes/web.php

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/providers', [ProviderController::class, 'index']);
Route::get('/providers/{provider}', [ProviderController::class, 'show']);
Route::get('/create', [ProviderController::class, 'create']);
Route::post('/providers', [ProviderController::class, 'store']);
Route::delete('/providers/{provider}', [ProviderController::class, 'destroy']);
Route::get('/providers/{provider}/edit', [ProviderController::class, 'edit']);
Route::put('/providers/{provider}', [ProviderController::class, 'update']);


Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
Route::get('/bills/create', [BillController::class, 'create'])->name('bills.create');
Route::post('/bills', [BillController::class, 'store'])->name('bills.store');
Route::get('/bills/{bill}', [BillController::class, 'show'])->name('bills.show');
Route::get('/bills/{bill}/edit', [BillController::class, 'edit'])->name('bills.edit');
Route::put('/bills/{bill}', [BillController::class, 'update'])->name('bills.update');
Route::delete('/bills/{bill}', [BillController::class, 'destroy'])->name('bills.destroy');


Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/user', function () {
    return auth()->user();
})->middleware('auth:sanctum');