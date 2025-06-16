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
 // METHOD BARU: Halaman "hub" yang menampilkan link ke setiap kategori.
    public function programHub()
    {
        // Kita bisa kirim data kategori ke view jika ingin membuatnya dinamis
        $categories = [
            'program-pesantren' => [
                'title' => 'Program Unggulan Pesantren',
                'description' => 'Program inti untuk pendalaman ilmu agama dan Al-Qur\'an.',
                'image' => 'images/hub-pesantren.jpg' // Path ke gambar representatif
            ],
            'pendidikan-formal' => [
                'title' => 'Pendidikan Formal',
                'description' => 'Pendidikan berjenjang yang terintegrasi dengan kurikulum nasional.',
                'image' => 'images/hub-formal.jpg'
            ],
            'ekstrakulikuler' => [
                'title' => 'Ekstrakurikuler',
                'description' => 'Kegiatan pengembangan bakat, minat, dan keterampilan santri.',
                'image' => 'images/hub-ekstra.jpg'
            ],
        ];

        return view('program-hub', compact('categories'));
    }

    // METHOD BARU: Halaman yang menampilkan daftar program berdasarkan kategori.
    public function programByCategory($category_slug)
    {
        // Konversi slug URL menjadi nama kategori di database
        $kategori_map = [
            'program-pesantren' => 'program_pesantren',
            'pendidikan-formal' => 'pendidikan_formal',
            'ekstrakulikuler' => 'ekstrakulikuler',
        ];
        
        // Validasi slug kategori
        if (!array_key_exists($category_slug, $kategori_map)) {
            abort(404);
        }

        $db_kategori = $kategori_map[$category_slug];

        // Ambil data program untuk kategori ini
        $programs = ProgramPendidikan::where('kategori', $db_kategori)->get();
        
        // Ambil judul yang user-friendly
        $categoryTitle = ucwords(str_replace('-', ' ', $category_slug));

        return view('program-category', compact('programs', 'categoryTitle'));
    }

    // Halaman detail program (ini tidak berubah)
    public function programShow(ProgramPendidikan $programPendidikan)
    {
        return view('program-show', ['program' => $programPendidikan]);
    }


    // Halaman PPDB
    public function ppdbIndex()
    {
        $ppdbInfos = \App\Models\PpdbInfo::all()->groupBy('kategori');
        return view('ppdb', ['ppdbInfos' => $ppdbInfos]);
    }


    // Halaman khusus untuk formulir pendaftaran PPDB
       public function ppdbDaftar()
    {
        return view('ppdb-daftar');
    }

    // Halaman Galeri
    public function galeri()
    {
        // Ambil semua foto, urutkan dari yang terbaru
        $photos = Gallery::latest()->paginate(12); 
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
