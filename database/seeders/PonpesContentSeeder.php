<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// Import semua model yang akan kita gunakan
use App\Models\Visi;
use App\Models\Misi;
use App\Models\Sejarah;
use App\Models\Larangan;
use App\Models\JadwalKegiatan;
use App\Models\ProgramPendidikan;
use App\Models\PpdbInfo;
use App\Models\PageContent; // Untuk dibersihkan

class PonpesContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Nonaktifkan foreign key checks untuk proses truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan tabel-tabel baru sebelum diisi
        Visi::truncate();
        Misi::truncate();
        Sejarah::truncate();
        Larangan::truncate();
        
        // Kosongkan tabel-tabel lain yang diisi oleh seeder ini
        JadwalKegiatan::truncate();
        ProgramPendidikan::truncate();
        PpdbInfo::truncate();
        
        // Kosongkan tabel lama jika masih ada, untuk kebersihan
        PageContent::truncate();
        
        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // =================================================================
        // 1. MENGISI KONTEN PROFIL (VISI, MISI, SEJARAH, LARANGAN)
        // =================================================================
        
        // Isi Visi (hanya 1 entri)
        Visi::create([
            'content' => json_encode([
                "Mendorong serta membantu para santri maupun pelajar untuk mengenali potensi diri, sehingga dapat dikembangkan secara optimal.",
                "Melakukan pembelajaran dan bimbingan secara efektif dan menyenangkan.",
                "Menanamkan serta membagikan ilmu pengetahuan umum dan nilai-nilai agama Islam dengan kaidah Ahlus Sunnah Wal Jama'ah An-Nahdliyah pada diri para santri maupun pelajar.",
                "Melaksanakan pengembangan dasar yang kondusif dan inovatif. Kelima, membekali peserta didik mempelajari tentang IPTEK (Ilmu Pengetahuan Teknologi). Keenam, membantu dan menyiapkan para santri maupun pelajar melanjutkan ke jenjang pendidikan yang lebih tinggi."
            ])
        ]);

        // Isi Misi (hanya 1 entri)
        Misi::create([
            'content' => json_encode([
                "Mencetak generasi yang berjiwa nasionalisme, cerdas, berdikari, serta kreatif.",
                "Mewujudkan para santri dan pelajar untuk mantap dalam IMTAQ (Iman dan Taqwa) yang luhur dalam akhlak, unggul meningkatkan prestasi, serta terampil memajukan teknologi.",
                "Mewujudkan lembaga pendidikan dengan ilmu kejuruan yang berlandaskan akhlakul karimah. Sehingga mampu membentuk lulusan yang berkarakter unggul.",
                "Terbentuknya generasi yang beriman, bertakwa, berilmu, berprestasi, serta berwawasan kebangsaan serta berakidah, dan"
            ])
        ]);

        // Isi Sejarah (hanya 1 entri, konten bisa ditambahkan di sini)
        Sejarah::create([
            'content' => '<h3>Awal Mula Perjuangan</h3><p>Tuliskan narasi lengkap mengenai sejarah berdirinya Pondok Pesantren Mojosari di sini. Anda bisa menggunakan paragraf, heading, dan list untuk memformat konten ini. Konten ini bisa diedit kapan saja melalui panel admin.</p><h3>Perkembangan dari Masa ke Masa</h3><p>Jelaskan perkembangan signifikan yang terjadi...</p>'
        ]);

        // Isi Larangan (hanya 1 entri)
        Larangan::create([
            'content' => json_encode([
                "Membawa alat elektronik apapun kecuali SMK jurusan Multimedia dan RPL (laptop) ITM (hp+laptop) dengan ketentuan khusus",
                "Mewarnai rambut",
                "Memakai perhiasan berlebihan",
                "Membawa lemari tambahan"
            ])
        ]);

        // =================================================================
        // 2. MENGISI JADWAL KEGIATAN
        // =================================================================
        JadwalKegiatan::insert([
            // Jadwal Harian
            ['waktu' => '03.00', 'kegiatan' => 'Bangun Sholat Tahajud', 'tipe' => 'harian', 'urutan' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '04.00', 'kegiatan' => 'Persiapan Jamaah Sholat Subuh + Ngaji Surah Yasin', 'tipe' => 'harian', 'urutan' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '05.00', 'kegiatan' => 'Sorogan', 'tipe' => 'harian', 'urutan' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '05.30', 'kegiatan' => 'Piket, Persiapan Sekolah Pagi, Sarapan', 'tipe' => 'harian', 'urutan' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '07.00 - 12.30', 'kegiatan' => 'Sekolah Pagi', 'tipe' => 'harian', 'urutan' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '12.30', 'kegiatan' => 'Sholat Dzuhur Berjamaah', 'tipe' => 'harian', 'urutan' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '13.20', 'kegiatan' => 'Makan Siang', 'tipe' => 'harian', 'urutan' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '13.30 - 15.30', 'kegiatan' => 'Sekolah Diniyah', 'tipe' => 'harian', 'urutan' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '16.00', 'kegiatan' => "Sholat Asar Berjama'ah", 'tipe' => 'harian', 'urutan' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '16.30', 'kegiatan' => 'Sorogan, Piket, Mandi, Makan Sore (+ Ekstra Untuk Santri Baru)', 'tipe' => 'harian', 'urutan' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '18.00', 'kegiatan' => "Sholat Maghrib Berjama'ah + Membaca Juz Amma (+sorogan)", 'tipe' => 'harian', 'urutan' => 11, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '19.00', 'kegiatan' => "Sholat Isya' Berjama'ah + Ngaji Surah Al Mulk + Asmaul Husna", 'tipe' => 'harian', 'urutan' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '19.30 - 20.30', 'kegiatan' => "Sya'ir Diniyah", 'tipe' => 'harian', 'urutan' => 13, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '20.30 - 21.30', 'kegiatan' => 'Belajar', 'tipe' => 'harian', 'urutan' => 14, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => '22.00', 'kegiatan' => 'Diwajibkan Tidur', 'tipe' => 'harian', 'urutan' => 15, 'created_at' => now(), 'updated_at' => now()],
            // Jadwal Tambahan
            ['waktu' => 'Setiap Hari Sabtu dan Ahad', 'kegiatan' => "Ngaji S. Ar-Rahman & Al-Waqiah", 'tipe' => 'tambahan', 'urutan' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => "Setiap Hari Kamis (ba'da sholat maghrib)", 'kegiatan' => "Tahlil", 'tipe' => 'tambahan', 'urutan' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => "Setiap hari Senin (ba'da sholat isya')", 'kegiatan' => "Diba'", 'tipe' => 'tambahan', 'urutan' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => "Setiap hari Jum'at (ba'da sholat subuh)", 'kegiatan' => "Rotib", 'tipe' => 'tambahan', 'urutan' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['waktu' => "Setiap hari Jum'at (ba'da sholat dzuhur)", 'kegiatan' => "Ngaji S. Al-Jumu'ah", 'tipe' => 'tambahan', 'urutan' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // =================================================================
        // 3. MENGISI PROGRAM & PENDIDIKAN (Dengan Slug)
        // =================================================================
        $programs = [
            ['kategori' => 'program_pesantren', 'nama' => "TAHFIDZIL DAN TARTILIL QUR'AN", 'deskripsi' => 'Program unggulan untuk menjadi penghafal Al-Qur\'an yang memahami kaidah bacaan.'],
            ['kategori' => 'program_pesantren', 'nama' => "MADRASAH DINIYAH", 'deskripsi' => 'Program pendalaman ilmu-ilmu agama fundamental melalui kajian kitab kuning.'],
            ['kategori' => 'ekstrakulikuler', 'nama' => 'Khot', 'deskripsi' => 'Ekstrakurikuler seni kaligrafi Islam untuk melatih kesabaran dan keindahan tulisan.'],
            ['kategori' => 'ekstrakulikuler', 'nama' => "Qiro'ah", 'deskripsi' => 'Ekstrakurikuler seni melantunkan ayat suci Al-Qur\'an dengan irama yang merdu.'],
            ['kategori' => 'ekstrakulikuler', 'nama' => "Pencak Silat Porsigal", 'deskripsi' => 'Kegiatan seni bela diri untuk membangun disiplin, kekuatan fisik, dan mental.'],
            ['kategori' => 'pendidikan_formal', 'nama' => 'Mts NU', 'deskripsi' => 'Pendidikan formal setingkat SMP yang mengintegrasikan kurikulum nasional dan kepesantrenan.'],
            ['kategori' => 'pendidikan_formal', 'nama' => 'MA NU', 'deskripsi' => 'Pendidikan formal setingkat SMA untuk mempersiapkan santri menuju jenjang perguruan tinggi.'],
            ['kategori' => 'pendidikan_formal', 'nama' => 'SMK Al Basthomi Mojosari', 'deskripsi' => 'Pendidikan kejuruan di bidang teknologi (Multimedia & RPL) yang relevan dengan industri.'],
            ['kategori' => 'pendidikan_formal', 'nama' => 'ITM (Institut Teknologi Mojosari)', 'deskripsi' => 'Pendidikan tinggi untuk melahirkan intelektual Muslim yang menguasai IPTEK dan dilandasi IMTAQ.'],
        ];

        foreach ($programs as $program) {
            ProgramPendidikan::create([
                'kategori' => $program['kategori'],
                'nama' => $program['nama'],
                'slug' => Str::slug($program['nama']),
                'deskripsi' => $program['deskripsi'],
            ]);
        }

        // =================================================================
        // 4. MENGISI INFORMASI PPDB
        // =================================================================
        PpdbInfo::insert([
            // Ketentuan Umum
            ['kategori' => 'ketentuan_umum', 'judul' => 'Santri Baru Masuk Pondok', 'deskripsi' => 'Sabtu, 5 Juli 2025 / 9 Shofar 1447 H', 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            // Syarat Pendaftaran
            ['kategori' => 'syarat_pendaftaran', 'judul' => 'Mengisi Formulir Pendaftaran', 'deskripsi' => null, 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'syarat_pendaftaran', 'judul' => 'Fotokopi KK', 'deskripsi' => '1 Lembar', 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'syarat_pendaftaran', 'judul' => 'Fotokopi Akte Kelahiran', 'deskripsi' => '1 Lembar', 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'syarat_pendaftaran', 'judul' => 'Foto Santri', 'deskripsi' => 'Ukuran 3x4, Background Merah (3 Lembar)', 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'syarat_pendaftaran', 'judul' => 'Foto mahram', 'deskripsi' => 'Ukuran 3x4 (2 lembar)', 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'syarat_pendaftaran', 'judul' => 'Lunas Biaya Administrasi', 'deskripsi' => 'Maksimal Tanggal 31 Agustus 2025', 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'syarat_pendaftaran', 'judul' => 'Pembayaran Syahriyah Bulanan', 'deskripsi' => 'Maksimal Tanggal 15 Setiap Bulannya', 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'syarat_pendaftaran', 'judul' => 'Pembayaran Bisa Melalui Transfer Ke Rekening BRI', 'deskripsi' => "Atas Nama : Aisyah Nihayatun Nu'ama, No. Rekening : 374901026143356", 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            // Biaya
            ['kategori' => 'biaya', 'judul' => 'Daftar Ulang Santri Baru (Pendaftaran, Almari, Seragam, Jariyah, Kartu Mahrom)', 'deskripsi' => null, 'nilai' => '825000', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'biaya', 'judul' => 'Syahriah dan Makan 3x Sehari', 'deskripsi' => null, 'nilai' => '375000', 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'biaya', 'judul' => 'Kas, Air Galon, Ekstrakurikuler dan Pembangunan', 'deskripsi' => null, 'nilai' => '50000', 'created_at' => now(), 'updated_at' => now()],
            // Perlengkapan
            ['kategori' => 'ketentuan_khusus', 'judul' => 'Pakaian sehari-hari', 'deskripsi' => "Baju ganti (max. 4 stel); baju putih & jilbab putih (tidak berbahan kaos, tidak ketat/menyerawang, panjang baju 10 cm di atas lutut); Celana & leging panjang (min. 2); Ikat jilbab/ciput", 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan ibadah', 'deskripsi' => "Mukena terusan berwarna putih dan tidak transparan; Sajadah, Al-Qur'an pojok, Manaqib; Al-Qur'an pojok, diba', manaqib & wiridan (tersedia di koperasi pondok)", 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan mandi dan mencuci', 'deskripsi' => null, 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan tidur', 'deskripsi' => 'Bantal/guling & Selimut; Alas Tidur Disediakan Pondok', 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan makan', 'deskripsi' => null, 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
            ['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan sekolah', 'deskripsi' => null, 'nilai' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}