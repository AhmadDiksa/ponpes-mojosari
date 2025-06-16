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

// Halaman Profil (Visi, Misi, Larangan)
Route::get('/profil', [LandingPageController::class, 'profil'])->name('profil');

// Halaman Jadwal Kegiatan
Route::get('/kegiatan', [LandingPageController::class, 'kegiatan'])->name('kegiatan');

// Halaman Penerimaan Santri Baru (PPDB)
Route::get('/ppdb', [LandingPageController::class, 'ppdb'])->name('ppdb');


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
// Halaman daftar semua foto di galeri dengan paginasi
Route::get('/galeri', [LandingPageController::class, 'galeri'])->name('galeri');


// --- Rute untuk Berita & Artikel ---
// Halaman daftar semua berita dengan paginasi
Route::get('/berita', [LandingPageController::class, 'beritaIndex'])->name('berita.index');

// Halaman detail untuk satu berita (menggunakan slug)
Route::get('/berita/{berita:slug}', [LandingPageController::class, 'beritaShow'])->name('berita.show');