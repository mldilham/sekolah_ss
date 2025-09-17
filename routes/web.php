<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'home'])->name('home');

// Login routes
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'auth'])->name('auth');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'registerView'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
// Admin dashboard
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/siswa', [AdminController::class, 'siswaView'])->name('admin.siswa');
    Route::get('/admin/siswa/create', [AdminController::class, 'create'])->name('admin.siswa.create');
});

// Operator dashboard
Route::middleware(['operator'])->group(function () {
    Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.dashboard');
    Route::get('/operator/siswa', [OperatorController::class, 'index'])->name('operator.siswa');
});

Route::get('/siswa',[SiswaController::class,'index'])->name('siswa.dashboard');
