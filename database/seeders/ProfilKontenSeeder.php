<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilKonten; // Import model yang relevan

class ProfilKontenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Kosongkan tabel profil_kontens sebelum mengisi untuk menghindari duplikasi
        ProfilKonten::truncate();

        // =================================================================
        // MENGISI KONTEN VISI (PER POIN)
        // =================================================================
        $visiItems = [
            "Mendorong serta membantu para santri maupun pelajar untuk mengenali potensi diri, sehingga dapat dikembangkan secara optimal.",
            "Melakukan pembelajaran dan bimbingan secara efektif dan menyenangkan.",
            "Menanamkan serta membagikan ilmu pengetahuan umum dan nilai-nilai agama Islam dengan kaidah Ahlus Sunnah Wal Jama'ah An-Nahdliyah pada diri para santri maupun pelajar.",
            "Melaksanakan pengembangan dasar yang kondusif dan inovatif.",
            "Membekali peserta didik mempelajari tentang IPTEK (Ilmu Pengetahuan Teknologi).",
            "Membantu dan menyiapkan para santri maupun pelajar melanjutkan ke jenjang pendidikan yang lebih tinggi."
        ];
        foreach ($visiItems as $index => $item) {
            ProfilKonten::create([
                'kategori' => 'visi',
                'konten' => $item,
                'urutan' => $index + 1,
            ]);
        }

        // =================================================================
        // MENGISI KONTEN MISI (PER POIN)
        // =================================================================
        $misiItems = [
            "Mencetak generasi yang berjiwa nasionalisme, cerdas, berdikari, serta kreatif.",
            "Mewujudkan para santri dan pelajar untuk mantap dalam IMTAQ (Iman dan Taqwa) yang luhur dalam akhlak, unggul meningkatkan prestasi, serta terampil memajukan teknologi.",
            "Mewujudkan lembaga pendidikan dengan ilmu kejuruan yang berlandaskan akhlakul karimah. Sehingga mampu membentuk lulusan yang berkarakter unggul.",
            "Terbentuknya generasi yang beriman, bertakwa, berilmu, berprestasi, serta berwawasan kebangsaan serta berakidah."
        ];
        foreach ($misiItems as $index => $item) {
            ProfilKonten::create([
                'kategori' => 'misi',
                'konten' => $item,
                'urutan' => $index + 1,
            ]);
        }

        // =================================================================
        // MENGISI KONTEN SEJARAH (PER PARAGRAF)
        // =================================================================
        $sejarahItems = [
            '<h3>Awal Mula Perjuangan</h3><p>Ini adalah konten dummy untuk sejarah. Tuliskan narasi lengkap mengenai sejarah berdirinya Pondok Pesantren Mojosari di sini. Anda bisa menggunakan paragraf, heading, dan list untuk memformat konten ini. Konten ini bisa diedit kapan saja melalui panel admin.</p>',
            '<h3>Perkembangan dari Masa ke Masa</h3><p>Ini adalah paragraf kedua untuk sejarah. Jelaskan perkembangan signifikan yang terjadi, tokoh-tokoh penting yang terlibat, serta tonggak-tonggak sejarah lainnya yang membentuk pondok pesantren hingga seperti sekarang ini.</p>',
        ];
        foreach ($sejarahItems as $index => $item) {
            ProfilKonten::create([
                'kategori' => 'sejarah',
                'konten' => $item,
                'urutan' => $index + 1,
            ]);
        }

        // =================================================================
        // MENGISI KONTEN LARANGAN (PER POIN)
        // =================================================================
        $laranganItems = [
            "Membawa alat elektronik apapun kecuali SMK jurusan Multimedia dan RPL (laptop) ITM (hp+laptop) dengan ketentuan khusus.",
            "Mewarnai rambut.",
            "Memakai perhiasan berlebihan.",
            "Membawa lemari tambahan."
        ];
        foreach ($laranganItems as $index => $item) {
            ProfilKonten::create([
                'kategori' => 'larangan',
                'konten' => $item,
                'urutan' => $index + 1,
            ]);
        }
    }
}