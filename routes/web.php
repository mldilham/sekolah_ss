<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('/public', [Controller::class, 'public'])->name('public');
Route::get('/profile', [Controller::class, 'profile'])->name('profile');

// Public routes
Route::get('/berita', [PublicController::class, 'berita'])->name('public.berita');
Route::get('/berita/detail/{id}', [PublicController::class, 'detailBerita'])->name('public.berita.detail');
Route::get('/galeri', [PublicController::class, 'galeri'])->name('public.galeri');
Route::get('/galeri/foto', [PublicController::class, 'foto'])->name('public.galeri.foto');
Route::get('/galeri/video', [PublicController::class, 'video'])->name('public.galeri.video');


// Route::get('/layanan', [PublicController::class, 'layanan'])->name('public.layanan');
Route::get('/layanan/guru', [PublicController::class, 'guru'])->name('public.layanan.guru');
Route::get('/layanan/guru/detail/{id}', [PublicController::class, 'detailGuru'])->name('public.layanan.guru.detail');
Route::get('/layanan/siswa', [PublicController::class, 'siswa'])->name('public.layanan.siswa');

Route::get('/ekskul', [PublicController::class, 'ekskul'])->name('public.ekskul');
Route::get('/ekskul/detail/{id}', [PublicController::class, 'detailEkskul'])->name('public.ekskul.detail');

// Route::get('/profile-sekolah', [PublicController::class, 'profile'])->name('public.profile');
Route::get('/profile/informasi', [PublicController::class, 'informasi'])->name('public.profile.informasi');
Route::get('/profile/visi-misi', [PublicController::class, 'visiMisi'])->name('public.profile.visi-misi');
Route::get('/profile/deskripsi', [PublicController::class, 'deskripsi'])->name('public.profile.deskripsi');

// Login routes
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'auth'])->name('auth');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'registerView'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
// Admin dashboard
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

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

    Route::get('/admin/profile', [AdminController::class, 'profileView'])->name('admin.profile');
    // // Route::get('/admin/profile/create', [AdminController::class, 'createProfile'])->name('admin.profile.create');
    // // Route::post('/admin/profile/create', [AdminController::class, 'storeProfile'])->name('admin.profile.store');
    Route::get('/admin/profile/edit/', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
    Route::put('/admin/profile/edit/', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    // Route::delete('/admin/profile/{id}', [AdminController::class, 'destroyProfile'])->name('admin.profile.destroy');
});

// Operator dashboard
Route::middleware(['operator'])->group(function () {
    Route::get('/operator/dashboard', [OperatorController::class, 'dashboard'])->name('operator.dashboard');

    // Berita
    Route::get('/operator/berita', [OperatorController::class, 'beritaView'])->name('operator.berita');
    Route::get('/operator/berita/create', [OperatorController::class, 'createBerita'])->name('operator.berita.create');
    Route::post('/operator/berita/create', [OperatorController::class, 'storeBerita'])->name('operator.berita.store');
    Route::get('/operator/berita/edit/{id}', [OperatorController::class, 'editBerita'])->name('operator.berita.edit');
    Route::put('/operator/berita/edit/{id}', [OperatorController::class, 'updateBerita'])->name('operator.berita.update');
    Route::delete('/operator/berita/{id}', [OperatorController::class, 'destroyBerita'])->name('operator.berita.destroy');

    // Galeri
    Route::get('/operator/galeri', [OperatorController::class, 'galeriView'])->name('operator.galeri');
    Route::get('/operator/galeri/create', [OperatorController::class, 'createGaleri'])->name('operator.galeri.create');
    Route::post('/operator/galeri/create', [OperatorController::class, 'storeGaleri'])->name('operator.galeri.store');
    Route::get('/operator/galeri/edit/{id}', [OperatorController::class, 'editGaleri'])->name('operator.galeri.edit');
    Route::put('/operator/galeri/edit/{id}', [OperatorController::class, 'updateGaleri'])->name('operator.galeri.update');
    Route::delete('/operator/galeri/{id}', [OperatorController::class, 'destroyGaleri'])->name('operator.galeri.destroy');

    // Ekskul
    Route::get('/operator/ekskul', [OperatorController::class, 'ekskulView'])->name('operator.ekskul');
    Route::get('/operator/ekskul/create', [OperatorController::class, 'createEkskul'])->name('operator.ekskul.create');
    Route::post('/operator/ekskul/create', [OperatorController::class, 'storeEkskul'])->name('operator.ekskul.store');
    Route::get('/operator/ekskul/edit/{id}', [OperatorController::class, 'editEkskul'])->name('operator.ekskul.edit');
    Route::put('/operator/ekskul/edit/{id}', [OperatorController::class, 'updateEkskul'])->name('operator.ekskul.update');
    Route::delete('/operator/ekskul/{id}', [OperatorController::class, 'destroyEkskul'])->name('operator.ekskul.destroy');

    // Siswa
    Route::get('/operator/siswa', [OperatorController::class, 'siswaView'])->name('operator.siswa');
    Route::get('/operator/siswa/create', [OperatorController::class, 'createSiswa'])->name('operator.siswa.create');
    Route::post('/operator/siswa/create', [OperatorController::class, 'storeSiswa'])->name('operator.siswa.store');
    Route::get('/operator/siswa/edit/{id}', [OperatorController::class, 'editSiswa'])->name('operator.siswa.edit');
    Route::put('/operator/siswa/edit/{id}', [OperatorController::class, 'updateSiswa'])->name('operator.siswa.update');
    Route::delete('/operator/siswa/{id}', [OperatorController::class, 'destroySiswa'])->name('operator.siswa.destroy');

    // Profile
    Route::get('/operator/profile', [OperatorController::class, 'profileView'])->name('operator.profile');
    Route::get('/operator/profile/edit/', [OperatorController::class, 'editProfile'])->name('operator.profile.edit');
    Route::put('/operator/profile/edit/', [OperatorController::class, 'updateProfile'])->name('operator.profile.update');
});
