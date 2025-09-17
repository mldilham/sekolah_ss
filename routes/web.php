<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OperatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'home'])->name('home');

// Login routes
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'auth'])->name('auth');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Admin dashboard
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Operator dashboard
Route::middleware(['operator'])->group(function () {
    Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.dashboard');
});
