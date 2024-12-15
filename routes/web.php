<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JenisAkreditasiController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\TingkatController;
use App\Http\Controllers\KategoriSOPController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\NarasumberController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\ProfilProdiController;
use App\Http\Controllers\DokumenKurikulumController;
use App\Http\Controllers\SOPController;
use App\Http\Controllers\TenagaAhliController;
use App\Http\Controllers\KoleksiJurnalController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\PengembanganDiriController;
use App\Http\Controllers\RuangKelasController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\KebangsaanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;

// Route untuk halaman utama
Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');

// Route untuk autentikasi
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk dashboard yang memerlukan autentikasi
Route::middleware(['auth'])->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('dokumens', DokumenController::class);
    Route::resource('users', UserController::class);
    Route::resource('prodis', ProdiController::class);
    Route::resource('jenis_akreditasis', JenisAkreditasiController::class);
    Route::resource('lembagas', LembagaController::class);
    Route::resource('tingkats', TingkatController::class);
    Route::resource('kategori_sops', KategoriSOPController::class);
    Route::resource('kegiatans', KegiatanController::class);
    Route::resource('skemas', SkemaController::class);
    Route::resource('narasumbers', NarasumberController::class);
    Route::resource('pegawais', PegawaiController::class);
    Route::resource('akreditasis', AkreditasiController::class);
    Route::resource('visi_misis', VisiMisi::class);
    Route::resource('profil_prodis', ProfilProdiController::class);
    Route::resource('dokumen_kurikulums', DokumenKurikulumController::class);
    Route::resource('sops', SOPController::class);
    Route::resource('tenaga_ahlis', TenagaAhliController::class);
    Route::resource('koleksi_jurnals', KoleksiJurnalController::class);
    Route::resource('seminars', SeminarController::class);
    Route::resource('pengembangan_diris', PengembanganDiriController::class);
    Route::resource('ruang_kelas', RuangKelasController::class);
    Route::resource('pengabdians', PengabdianController::class);
    Route::resource('kebangsaans', KebangsaanController::class);
    Route::resource('ruangans', RuanganController::class);
    Route::resource('kategoris', KategoriController::class);
});