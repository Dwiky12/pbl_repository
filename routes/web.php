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
use App\Http\Controllers\SopController;
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
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['dosen'])->group(function () {
    Route::resource('dokumen_kurikulum', DokumenKurikulumController::class);
});
// Tambahkan route khusus untuk kaprodi menyetujui atau menolak dokumen
Route::middleware(['kaprodi'])->group(function () {
    Route::post('akreditasi/{id_akreditasi}/approve', [AkreditasiController::class, 'approve'])->name('akreditasi.approve');
    Route::post('akreditasi/{id_akreditasi}/reject', [AkreditasiController::class, 'reject'])->name('akreditasi.reject');
    
    Route::post('dokumen_kurikulum/{id_dokumenkurikulum}/approve', [DokumenKurikulumController::class, 'approve'])->name('dokumen_kurikulum.approve');
    Route::post('dokumen_kurikulum/{id_dokumenkurikulum}/reject', [DokumenKurikulumController::class, 'reject'])->name('dokumen_kurikulum.reject');

// Tambahkan route khusus untuk kaprodi menyetujui atau menolak dokumen
    Route::post('visi_misi/{id_visimisi}/approve', [VisiMisiController::class, 'approve'])->name('visi_misi.approve');
    Route::post('visi_misi/{id_visimisi}/reject', [VisiMisiController::class, 'reject'])->name('visi_misi.reject');

// Tambahkan route khusus untuk kaprodi menyetujui atau menolak dokumen
    Route::post('profil_prodi/{id_profilprodi}/approve', [ProfilProdiController::class, 'approve'])->name('profil_prodi.approve');
    Route::post('profil_prodi/{id_profilprodi}/reject', [ProfilProdiController::class, 'reject'])->name('profil_prodi.reject');

    Route::post('sop/{id_sop}/approve', [SopController::class, 'approve'])->name('sop.approve');
    Route::post('sop/{id_sop}/reject', [SopController::class, 'reject'])->name('sop.reject');

});

// Route untuk dashboard yang memerlukan autentikasi
Route::middleware(['auth'])->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('akreditasi', AkreditasiController::class);
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
    Route::resource('pegawais', PegawaiController::class);
    Route::resource('visi_misi', VisiMisiController::class);
    Route::resource('profil_prodis', ProfilProdiController::class);
    Route::resource('dokumen_kurikulums', DokumenKurikulumController::class);
    Route::resource('sops', SopController::class);
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