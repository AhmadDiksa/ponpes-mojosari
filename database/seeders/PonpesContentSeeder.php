<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PageContent;
use App\Models\JadwalKegiatan;
use App\Models\ProgramPendidikan;
use App\Models\PpdbInfo;

class PonpesContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nonaktifkan foreign key checks untuk proses truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan tabel sebelum mengisi untuk menghindari duplikasi data
        PageContent::truncate();
        JadwalKegiatan::truncate();
        ProgramPendidikan::truncate();
        PpdbInfo::truncate();
        
        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // =================================================================
        // 1. MENGISI KONTEN HALAMAN (VISI, MISI, LARANGAN)
        // =================================================================
        PageContent::create([
            'section_name' => 'visi',
            'content' => json_encode([
                "Mendorong serta membantu para santri maupun pelajar untuk mengenali potensi diri, sehingga dapat dikembangkan secara optimal.",
                "Melakukan pembelajaran dan bimbingan secara efektif dan menyenangkan.",
                "Menanamkan serta membagikan ilmu pengetahuan umum dan nilai-nilai agama Islam dengan kaidah Ahlus Sunnah Wal Jama'ah An-Nahdliyah pada diri para santri maupun pelajar.",
                "Melaksanakan pengembangan dasar yang kondusif dan inovatif. Kelima, membekali peserta didik mempelajari tentang IPTEK (Ilmu Pengetahuan Teknologi). Keenam, membantu dan menyiapkan para santri maupun pelajar melanjutkan ke jenjang pendidikan yang lebih tinggi."
            ])
        ]);

        PageContent::create([
            'section_name' => 'misi',
            'content' => json_encode([
                "Mencetak generasi yang berjiwa nasionalisme, cerdas, berdikari, serta kreatif.",
                "Mewujudkan para santri dan pelajar untuk mantap dalam IMTAQ (Iman dan Taqwa) yang luhur dalam akhlak, unggul meningkatkan prestasi, serta terampil memajukan teknologi.",
                "Mewujudkan lembaga pendidikan dengan ilmu kejuruan yang berlandaskan akhlakul karimah. Sehingga mampu membentuk lulusan yang berkarakter unggul.",
                "Terbentuknya generasi yang beriman, bertakwa, berilmu, berprestasi, serta berwawasan kebangsaan serta berakidah,"
            ])
        ]);

        PageContent::create([
            'section_name' => 'larangan',
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
        // JADWAL HARIAN
        JadwalKegiatan::create(['waktu' => '03.00', 'kegiatan' => 'Bangun Sholat Tahajud', 'tipe' => 'harian', 'urutan' => 1]);
        JadwalKegiatan::create(['waktu' => '04.00', 'kegiatan' => 'Persiapan Jamaah Sholat Subuh + Ngaji Surah Yasin', 'tipe' => 'harian', 'urutan' => 2]);
        JadwalKegiatan::create(['waktu' => '05.00', 'kegiatan' => 'Sorogan', 'tipe' => 'harian', 'urutan' => 3]);
        JadwalKegiatan::create(['waktu' => '05.30', 'kegiatan' => 'Piket, Persiapan Sekolah Pagi, Sarapan', 'tipe' => 'harian', 'urutan' => 4]);
        JadwalKegiatan::create(['waktu' => '07.00 - 12.30', 'kegiatan' => 'Sekolah Pagi', 'tipe' => 'harian', 'urutan' => 5]);
        JadwalKegiatan::create(['waktu' => '12.30', 'kegiatan' => 'Sholat Dzuhur Berjamaah', 'tipe' => 'harian', 'urutan' => 6]);
        JadwalKegiatan::create(['waktu' => '13.20', 'kegiatan' => 'Makan Siang', 'tipe' => 'harian', 'urutan' => 7]);
        JadwalKegiatan::create(['waktu' => '13.30 - 15.30', 'kegiatan' => 'Sekolah Diniyah', 'tipe' => 'harian', 'urutan' => 8]);
        JadwalKegiatan::create(['waktu' => '16.00', 'kegiatan' => "Sholat Asar Berjama'ah", 'tipe' => 'harian', 'urutan' => 9]);
        JadwalKegiatan::create(['waktu' => '16.30', 'kegiatan' => 'Sorogan, Piket, Mandi, Makan Sore (+ Ekstra Untuk Santri Baru)', 'tipe' => 'harian', 'urutan' => 10]);
        JadwalKegiatan::create(['waktu' => '18.00', 'kegiatan' => "Sholat Maghrib Berjama'ah + Membaca Juz Amma (+sorogan)", 'tipe' => 'harian', 'urutan' => 11]);
        JadwalKegiatan::create(['waktu' => '19.00', 'kegiatan' => "Sholat Isya' Berjama'ah + Ngaji Surah Al Mulk + Asmaul Husna", 'tipe' => 'harian', 'urutan' => 12]);
        JadwalKegiatan::create(['waktu' => '19.30 - 20.30', 'kegiatan' => "Sya'ir Diniyah", 'tipe' => 'harian', 'urutan' => 13]);
        JadwalKegiatan::create(['waktu' => '20.30 - 21.30', 'kegiatan' => 'Belajar', 'tipe' => 'harian', 'urutan' => 14]);
        JadwalKegiatan::create(['waktu' => '22.00', 'kegiatan' => 'Diwajibkan Tidur', 'tipe' => 'harian', 'urutan' => 15]);
        
        // JADWAL TAMBAHAN
        JadwalKegiatan::create(['waktu' => 'Setiap Hari Sabtu dan Ahad', 'kegiatan' => "Ngaji S. Ar-Rahman & Al-Waqiah", 'tipe' => 'tambahan', 'urutan' => 1]);
        JadwalKegiatan::create(['waktu' => "Setiap Hari Kamis (ba'da sholat maghrib)", 'kegiatan' => "Tahlil", 'tipe' => 'tambahan', 'urutan' => 2]);
        JadwalKegiatan::create(['waktu' => "Setiap hari Senin (ba'da sholat isya')", 'kegiatan' => "Diba'", 'tipe' => 'tambahan', 'urutan' => 3]);
        JadwalKegiatan::create(['waktu' => "Setiap hari Jum'at (ba'da sholat subuh)", 'kegiatan' => "Rotib", 'tipe' => 'tambahan', 'urutan' => 4]);
        JadwalKegiatan::create(['waktu' => "Setiap hari Jum'at (ba'da sholat dzuhur)", 'kegiatan' => "Ngaji S. Al-Jumu'ah", 'tipe' => 'tambahan', 'urutan' => 5]);


        // =================================================================
        // 3. MENGISI PROGRAM & PENDIDIKAN
        // =================================================================
        ProgramPendidikan::create([
            'kategori' => 'program_pesantren',
            'nama' => "TAHFIDZIL DAN TARTILIL QUR'AN",
            'slug' => 'tahfidzil-dan-tartilil-quran'
        ]);
        ProgramPendidikan::create([
            'kategori' => 'program_pesantren',
            'nama' => "MADRASAH DINIYAH",
            'slug' => 'madrasah-diniyah'
        ]);
        ProgramPendidikan::create([
            'kategori' => 'ekstrakulikuler',
            'nama' => 'Khot',
            'slug' => 'khot'
        ]);
        ProgramPendidikan::create([
            'kategori' => 'ekstrakulikuler',
            'nama' => "Qiro'ah",
            'slug' => 'qiroah'
        ]);
        ProgramPendidikan::create([
            'kategori' => 'ekstrakulikuler',
            'nama' => "Pencak Silat Porsigal",
            'slug' => 'pencak-silat-porsigal'
        ]);
        ProgramPendidikan::create([
            'kategori' => 'pendidikan_formal',
            'nama' => 'Mts NU',
            'slug' => 'mts-nu'
        ]);
        ProgramPendidikan::create([
            'kategori' => 'pendidikan_formal',
            'nama' => 'MA NU',
            'slug' => 'ma-nu'
        ]);
        ProgramPendidikan::create([
            'kategori' => 'pendidikan_formal',
            'nama' => 'SMK Al Basthomi Mojosari',
            'slug' => 'smk-al-basthomi-mojosari'
        ]);
        ProgramPendidikan::create([
            'kategori' => 'pendidikan_formal',
            'nama' => 'ITM (Institut Teknologi Mojosari)',
            'slug' => 'itm-institut-teknologi-mojosari'
        ]);

        
        // =================================================================
        // 4. MENGISI INFORMASI PPDB
        // =================================================================
        // KETENTUAN UMUM
        PpdbInfo::create(['kategori' => 'ketentuan_umum', 'judul' => 'Santri Baru Masuk Pondok', 'deskripsi' => 'Sabtu, 5 Juli 2025 / 9 Shofar 1447 H']);
        
        // SYARAT PENDAFTARAN
        PpdbInfo::create(['kategori' => 'syarat_pendaftaran', 'judul' => 'Mengisi Formulir Pendaftaran']);
        PpdbInfo::create(['kategori' => 'syarat_pendaftaran', 'judul' => 'Fotokopi KK', 'deskripsi' => '1 Lembar']);
        PpdbInfo::create(['kategori' => 'syarat_pendaftaran', 'judul' => 'Fotokopi Akte Kelahiran', 'deskripsi' => '1 Lembar']);
        PpdbInfo::create(['kategori' => 'syarat_pendaftaran', 'judul' => 'Foto Santri', 'deskripsi' => 'Ukuran 3x4, Background Merah (3 Lembar)']);
        PpdbInfo::create(['kategori' => 'syarat_pendaftaran', 'judul' => 'Foto mahram', 'deskripsi' => 'Ukuran 3x4 (2 lembar)']);
        PpdbInfo::create(['kategori' => 'syarat_pendaftaran', 'judul' => 'Lunas Biaya Administrasi', 'deskripsi' => 'Maksimal Tanggal 31 Agustus 2025']);
        PpdbInfo::create(['kategori' => 'syarat_pendaftaran', 'judul' => 'Pembayaran Syahriyah Bulanan', 'deskripsi' => 'Maksimal Tanggal 15 Setiap Bulannya']);
        PpdbInfo::create(['kategori' => 'syarat_pendaftaran', 'judul' => 'Pembayaran Bisa Melalui Transfer Ke Rekening BRI', 'deskripsi' => "Atas Nama : Aisyah Nihayatun Nu'ama, No. Rekening : 374901026143356"]);

        // BIAYA
        PpdbInfo::create(['kategori' => 'biaya', 'judul' => 'Daftar Ulang Santri Baru (Pendaftaran, Almari, Seragam, Jariyah, Kartu Mahrom)', 'nilai' => 825000]);
        PpdbInfo::create(['kategori' => 'biaya', 'judul' => 'Syahriah dan Makan 3x Sehari', 'nilai' => 375000]);
        PpdbInfo::create(['kategori' => 'biaya', 'judul' => 'Kas, Air Galon, Ekstrakurikuler dan Pembangunan', 'nilai' => 50000]);
        
        // PERLENGKAPAN (KETENTUAN KHUSUS)
        PpdbInfo::create(['kategori' => 'ketentuan_khusus', 'judul' => 'Pakaian sehari-hari', 'deskripsi' => "Baju ganti (max. 4 stel), baju putih & jilbab putih (tidak berbahan kaos, tidak ketat/menyerawang, panjang baju 10 cm di atas lutut);Celana & leging panjang (min. 2);Ikat jilbab/ciput"]);
        PpdbInfo::create(['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan ibadah', 'deskripsi' => "Mukena terusan berwarna putih dan tidak transparan;Sajadah, Al-Qur'an pojok, Manaqib;Al-Qur'an pojok, diba', manaqib & wiridan (tersedia di koperasi pondok)"]);
        PpdbInfo::create(['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan mandi dan mencuci']);
        PpdbInfo::create(['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan tidur', 'deskripsi' => 'Bantal/guling & Selimut;Alas Tidur Disediakan Pondok']);
        PpdbInfo::create(['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan makan']);
        PpdbInfo::create(['kategori' => 'ketentuan_khusus', 'judul' => 'Perlengkapan sekolah']);
    }
}