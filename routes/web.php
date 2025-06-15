<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

// Arahkan URL utama '/' ke method 'home' dan beri nama 'home'
Route::get('/', [LandingPageController::class, 'home'])->name('home');

// Buat rute untuk setiap halaman
Route::get('/profil', [LandingPageController::class, 'profil'])->name('profil');
Route::get('/kegiatan', [LandingPageController::class, 'kegiatan'])->name('kegiatan');
Route::get('/program', [LandingPageController::class, 'program'])->name('program');
Route::get('/ppdb', [LandingPageController::class, 'ppdb'])->name('ppdb');