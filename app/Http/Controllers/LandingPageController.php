<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\JadwalKegiatan;
use App\Models\PageContent;
use App\Models\PpdbInfo;
use App\Models\ProgramPendidikan;
use App\Models\Gallery;
use App\Models\Berita;
use App\Models\Pendaftaran;
use App\Models\Album;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ProfilKonten;

class LandingPageController extends Controller
{
    // Halaman Utama / Beranda
    public function home()
    {
        // Anda bisa mengirim data untuk Hero Section di sini jika perlu
        return view('home'); 
    }

    // Halaman Profil Utama
    public function profil()
    {
        return view('profil');
    }
    public function visiMisi()
    {
        // Ambil semua poin visi dan misi, diurutkan
        $visi = ProfilKonten::where('kategori', 'visi')->orderBy('urutan')->get();
        $misi = ProfilKonten::where('kategori', 'misi')->orderBy('urutan')->get();
        return view('profil-visi-misi', compact('visi', 'misi'));
    }

    public function sejarah()
    {
        $sejarah = ProfilKonten::where('kategori', 'sejarah')->orderBy('urutan')->get();
        return view('profil-sejarah', compact('sejarah'));
    }

    public function larangan()
    {
        $larangan = ProfilKonten::where('kategori', 'larangan')->orderBy('urutan')->get();
        return view('profil-larangan', compact('larangan'));
    }

        // Halaman Profil
        // public function visiMisi()
        // {
        //     $visi = PageContent::where('section_name', 'visi')->first();
        //     $misi = PageContent::where('section_name', 'misi')->first();
        //     // Kirim hanya Visi dan Misi ke view baru
        //     return view('profil-visi-misi', compact('visi', 'misi'));
        // }

        // // METHOD untuk Sejarah
        // public function sejarah()
        // {
        //     $sejarah = PageContent::where('section_name', 'sejarah')->first();
        //     return view('profil-sejarah', compact('sejarah'));
        // }

        // // METHOD untuk Larangan
        // public function larangan()
        // {
        //     $larangan = PageContent::where('section_name', 'larangan')->first();
        //     return view('profil-larangan', compact('larangan'));
        // }

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

        public function ppdbStore(Request $request)
        {
            // 1. Validasi Input
            $validated = $request->validate([
                'nama_santri' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tgl_lahir' => 'required|date',
                'nama_ayah' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'pekerjaan_ayah' => 'required|string|max:255',
                'pekerjaan_ibu' => 'required|string|max:255',
                'nomor_telepon' => 'required|string|max:15',
                'alamat_rumah' => 'required|string',
            ]);

            // 2. Logika Nomor Pendaftaran Otomatis
            $currentYear = date('Y');
            $lastRegistration = Pendaftaran::where('tahun_pendaftaran', $currentYear)
                                        ->orderBy('no_pendaftaran', 'desc')
                                        ->first();

            if ($lastRegistration) {
                $newRegistrationNumber = $lastRegistration->no_pendaftaran + 1;
            } else {
                $newRegistrationNumber = 1;
            }

            // 3. Simpan Data ke Database
            $pendaftaran = new Pendaftaran($validated);
            $pendaftaran->no_pendaftaran = $newRegistrationNumber;
            $pendaftaran->tahun_pendaftaran = $currentYear;
            $pendaftaran->save();

            // Redirect ke halaman sukses dengan membawa ID pendaftaran
            return redirect()->route('ppdb.success', ['pendaftaran' => $pendaftaran->id]);
        }


        public function ppdbSuccess(Pendaftaran $pendaftaran)
        {
            // Tampilkan view 'ppdb-success' dengan data pendaftaran yang sesuai
            return view('ppdb-success', compact('pendaftaran'));
        }

        // Halaman Galeri
        public function albumIndex()
        {
            // Ambil semua album, beserta jumlah foto di dalamnya
            $albums = Album::withCount('photos')->latest()->paginate(9);
            return view('album-index', compact('albums'));
        }
        
        // Method BARU untuk menampilkan isi album
        public function albumShow(Album $album)
        {
            // Load foto-foto yang berelasi dengan album ini
            $photos = $album->photos()->latest()->paginate(12);
            return view('album-show', compact('album', 'photos'));
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

        // METHOD BARU UNTUK DOWNLOAD PDF
        public function downloadFormulir(Pendaftaran $pendaftaran)
        {
            // Muat view PDF dengan data pendaftaran
            $pdf = Pdf::loadView('pdf.formulir-pendaftaran', compact('pendaftaran'));
            
            // Nama file saat di-download
            $fileName = 'Formulir_Pendaftaran_' . Str::slug($pendaftaran->nama_santri, '_') . '.pdf';
            
            // Download file PDF
            return $pdf->download($fileName);
        }
}
