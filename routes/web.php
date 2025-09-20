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

    Route::get('/admin/user', [AdminController::class, 'userView'])->name('admin.user');
    Route::get('/admin/user/create', [AdminController::class, 'createView'])->name('admin.user.create');
    Route::post('/admin/user/create', [AdminController::class, 'storeView'])->name('admin.user.store');
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'editView'])->name('admin.user.edit');
    Route::put('/admin/user/edit/{id}', [AdminController::class, 'updateView'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [AdminController::class, 'destroyView'])->name('admin.user.destroy');


    Route::get('/admin/siswa', [AdminController::class, 'siswaView'])->name('admin.siswa');
    Route::get('/admin/siswa/create', [AdminController::class, 'createSiswa'])->name('admin.siswa.create');
    Route::post('/admin/siswa/create', [AdminController::class, 'storeSiswa'])->name('admin.siswa.store');
    Route::get('/admin/siswa/edit/{id}', [AdminController::class, 'editSiswa'])->name('admin.siswa.edit');
    Route::put('/admin/siswa/edit/{id}', [AdminController::class, 'updateSiswa'])->name('admin.siswa.update');
    Route::delete('/admin/siswa/{id}', [AdminController::class, 'destroySiswa'])->name('admin.siswa.destroy');

    Route::get('/admin/guru', [AdminController::class, 'guruView'])->name('admin.guru');
    Route::get('/admin/guru/create', [AdminController::class, 'createGuru'])->name('admin.guru.create');
    Route::post('/admin/guru/create', [AdminController::class, 'storeGuru'])->name('admin.guru.store');
    Route::get('/admin/guru/edit/{id}', [AdminController::class, 'editGuru'])->name('admin.guru.edit');
    Route::put('/admin/guru/edit/{id}', [AdminController::class, 'updateGuru'])->name('admin.guru.update');
    Route::delete('/admin/guru/{id}', [AdminController::class, 'destroyGuru'])->name('admin.guru.destroy');

    Route::get('/admin/galeri', [AdminController::class, 'galeriView'])->name('admin.galeri');
    Route::get('/admin/galeri/create', [AdminController::class, 'createGaleri'])->name('admin.galeri.create');
    Route::post('/admin/galeri/create', [AdminController::class, 'storeGaleri'])->name('admin.galeri.store');
    Route::get('/admin/galeri/edit/{id}', [AdminController::class, 'editGaleri'])->name('admin.galeri.edit');
    Route::put('/admin/galeri/edit/{id}', [AdminController::class, 'updateGaleri'])->name('admin.galeri.update');
    Route::delete('/admin/galeri/{id}', [AdminController::class, 'destroyGaleri'])->name('admin.galeri.destroy');

    Route::get('/admin/berita', [AdminController::class, 'beritaView'])->name('admin.berita');
    Route::get('/admin/berita/create', [AdminController::class, 'createBerita'])->name('admin.berita.create');
    Route::post('/admin/berita/create', [AdminController::class, 'storeBerita'])->name('admin.berita.store');
    Route::get('/admin/berita/edit/{id}', [AdminController::class, 'editBerita'])->name('admin.berita.edit');
    Route::put('/admin/berita/edit/{id}', [AdminController::class, 'updateBerita'])->name('admin.berita.update');
    Route::delete('/admin/berita/{id}', [AdminController::class, 'destroyBerita'])->name('admin.berita.destroy');

    Route::get('/admin/ekskul', [AdminController::class, 'ekskulView'])->name('admin.ekskul');
    Route::get('/admin/ekskul/create', [AdminController::class, 'createEkskul'])->name('admin.ekskul.create');
    Route::post('/admin/ekskul/create', [AdminController::class, 'storeEkskul'])->name('admin.ekskul.store');
    Route::get('/admin/ekskul/edit/{id}', [AdminController::class, 'editEkskul'])->name('admin.ekskul.edit');
    Route::put('/admin/ekskul/edit/{id}', [AdminController::class, 'updateEkskul'])->name('admin.ekskul.update');
    Route::delete('/admin/ekskul/{id}', [AdminController::class, 'destroyEkskul'])->name('admin.ekskul.destroy');
});

// Operator dashboard
Route::middleware(['operator'])->group(function () {
    Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.dashboard');
    Route::get('/operator/siswa', [OperatorController::class, 'index'])->name('operator.siswa');
});

Route::get('/siswa',[SiswaController::class,'index'])->name('siswa.dashboard');
