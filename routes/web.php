<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah Anda mendaftarkan semua rute untuk bagian publik dari website Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan
| diberi middleware group "web".
|
| Catatan: Rute untuk panel admin Filament (/admin) ditangani secara otomatis
| oleh paket Filament dan tidak perlu didaftarkan di file ini.
|
*/

// =========================================================================
// RUTE HALAMAN UTAMA & HALAMAN STATIS
// =========================================================================

// Halaman Utama (Beranda)
Route::get('/', [LandingPageController::class, 'home'])->name('home');

// Route Profile
Route::get('/profil', [LandingPageController::class, 'profil'])->name('profil');
Route::get('/profil/visi-misi', [LandingPageController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/sejarah', [LandingPageController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/larangan', [LandingPageController::class, 'larangan'])->name('profil.larangan');

// Halaman Jadwal Kegiatan
Route::get('/kegiatan', [LandingPageController::class, 'kegiatan'])->name('kegiatan');

// Halaman Penerimaan Santri Baru (PPDB)
Route::get('/ppdb', [LandingPageController::class, 'ppdbIndex'])->name('ppdb.index');

// Route untuk menampilkan formulir
Route::get('/ppdb/daftar', [LandingPageController::class, 'ppdbDaftar'])->name('ppdb.daftar');

// Route untuk memproses formulir
Route::post('/ppdb/daftar', [LandingPageController::class, 'ppdbStore'])->name('ppdb.store');

// ROUTE Halaman sukses setelah pendaftaran
Route::get('/ppdb/sukses/{pendaftaran}', [LandingPageController::class, 'ppdbSuccess'])->name('ppdb.success');


// =========================================================================
// RUTE UNTUK FITUR DINAMIS
// =========================================================================

// --- Rute untuk Program & Pendidikan ---
// 1. Halaman "hub" utama untuk semua program.
Route::get('/program', [LandingPageController::class, 'programHub'])->name('program.hub');

// 2. Halaman dinamis untuk setiap kategori.
Route::get('/program/kategori/{category_slug}', [LandingPageController::class, 'programByCategory'])->name('program.category');

// 3. Halaman detail untuk setiap program (ini tidak berubah).
Route::get('/program/{programPendidikan:slug}', [LandingPageController::class, 'programShow'])->name('program.show');


// --- Rute untuk Galeri Foto ---
Route::get('/galeri', [LandingPageController::class, 'albumIndex'])->name('galeri.index');
Route::get('/galeri/album/{album:slug}', [LandingPageController::class, 'albumShow'])->name('album.show');



// --- Rute untuk Berita & Artikel ---
// Halaman daftar semua berita dengan paginasi
Route::get('/berita', [LandingPageController::class, 'beritaIndex'])->name('berita.index');

// Halaman detail untuk satu berita (menggunakan slug)
Route::get('/berita/{berita:slug}', [LandingPageController::class, 'beritaShow'])->name('berita.show');

// Route untuk mengunduh formulir pendaftaran
Route::get('/ppdb/formulir/{pendaftaran}/download', [LandingPageController::class, 'downloadFormulir'])->name('ppdb.download');

use App\Exports\PendaftaranExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/export-pendaftaran', function () {
    return Excel::download(new PendaftaranExport, 'pendaftaran.xlsx');
})->middleware('auth')->name('export-pendaftaran');