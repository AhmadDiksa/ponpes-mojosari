<?php

namespace App\Http\Controllers;

use App\Models\JadwalKegiatan;
use App\Models\PageContent;
use App\Models\PpdbInfo;
use App\Models\ProgramPendidikan;
use App\Models\Gallery;
use App\Models\Berita;

class LandingPageController extends Controller
{
    // Halaman Utama / Beranda
    public function home()
    {
        // Anda bisa mengirim data untuk Hero Section di sini jika perlu
        return view('home'); 
    }

    // Halaman Profil
    public function profil()
    {
        $visi = PageContent::where('section_name', 'visi')->first();
        $misi = PageContent::where('section_name', 'misi')->first();
        $larangan = PageContent::where('section_name', 'larangan')->first();
        return view('profil', compact('visi', 'misi', 'larangan'));
    }

    // Halaman Kegiatan
    public function kegiatan()
    {
        $jadwalHarian = JadwalKegiatan::where('tipe', 'harian')->orderBy('urutan')->get();
        $jadwalTambahan = JadwalKegiatan::where('tipe', 'tambahan')->orderBy('urutan')->get();
        return view('kegiatan', compact('jadwalHarian', 'jadwalTambahan'));
    }

    // Halaman Program & Pendidikan
    public function program()
    {
        $programPesantren = ProgramPendidikan::where('kategori', 'program_pesantren')->get();
        $ekstrakulikuler = ProgramPendidikan::where('kategori', 'ekstrakulikuler')->get();
        $pendidikanFormal = ProgramPendidikan::where('kategori', 'pendidikan_formal')->get();
        return view('program', compact('programPesantren', 'ekstrakulikuler', 'pendidikanFormal'));
    }

    // Halaman PPDB
    public function ppdb()
    {
        // Ambil semua data PPDB
        $ppdbInfos = PpdbInfo::all()->groupBy('kategori');
        return view('ppdb', ['ppdbInfos' => $ppdbInfos]);
    }

    // Halaman Galeri
    public function galeri()
    {
        // Ambil semua foto, urutkan dari yang terbaru
        $photos = Gallery::latest()->get(); 
        return view('galeri', compact('photos'));
    }

    // Method untuk halaman daftar berita
    public function beritaIndex()
    {
        $beritas = Berita::where('status', 'published')
                        ->where('published_at', '<=', now()) // Hanya tampilkan yang sudah waktunya publish
                        ->latest('published_at') // Urutkan dari yang terbaru
                        ->paginate(6); // Tampilkan 6 berita per halaman

        return view('berita-index', compact('beritas'));
    }

    // Method untuk halaman detail berita (menggunakan Route Model Binding)
    public function beritaShow(Berita $berita)
    {
        // Pastikan hanya artikel yang sudah dipublikasikan yang bisa diakses
        if ($berita->status !== 'published' || $berita->published_at > now()) {
            abort(404);
        }

        return view('berita-show', compact('berita'));
    }
}
