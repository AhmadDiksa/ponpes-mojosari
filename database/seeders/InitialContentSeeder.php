<?php
// database/seeders/InitialContentSeeder.php
namespace Database\Seeders;

use App\Models\JadwalKegiatan;
use App\Models\PageContent;
use Illuminate\Database\Seeder;

class InitialContentSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat
        PageContent::truncate();
        JadwalKegiatan::truncate();

        // Isi Visi
        PageContent::create([
            'section_name' => 'visi',
            'content' => json_encode([
                "Mendorong serta membantu para santri maupun pelajar untuk mengenali potensi diri, sehingga dapat dikembangkan secara optimal.",
                "Melakukan pembelajaran dan bimbingan secara efektif dan menyenangkan.",
                "Menanamkan serta membagikan ilmu pengetahuan umum dan nilai-nilai agama Islam dengan kaidah Ahlus Sunnah Wal Jama'ah An-Nahdliyah pada diri para santri maupun pelajar.",
                "Melaksanakan pengembangan dasar yang kondusif dan inovatif. Kelima, membekali peserta didik mempelajari tentang IPTEK (Ilmu Pengetahuan Teknologi). Keenam, membantu dan menyiapkan para santri maupun pelajar melanjutkan ke jenjang pendidikan yang lebih tinggi."
            ])
        ]);
        
        // Isi Misi
        PageContent::create([
            'section_name' => 'misi',
            'content' => json_encode([
                "Mencetak generasi yang berjiwa nasionalisme, cerdas, berdikari, serta kreatif.",
                "Mewujudkan para santri dan pelajar untuk mantap dalam IMTAQ (Iman dan Taqwa) yang luhur dalam akhlak, unggul meningkatkan prestasi, serta terampil memajukan teknologi.",
                "Mewujudkan lembaga pendidikan dengan ilmu kejuruan yang berlandaskan akhlakul karimah. Sehingga mampu membentuk lulusan yang berkarakter unggul.",
                "Terbentuknya generasi yang beriman, bertakwa, berilmu, berprestasi, serta berwawasan kebangsaan serta berakidah, dan"
            ])
        ]);

        // Isi Jadwal
        JadwalKegiatan::create(['waktu' => '03.00', 'kegiatan' => 'Bangun Sholat Tahajud', 'urutan' => 1]);
        JadwalKegiatan::create(['waktu' => '04.00', 'kegiatan' => 'Persiapan Jamaah Sholat Subuh + Ngaji Surah Yasin', 'urutan' => 2]);
        JadwalKegiatan::create(['waktu' => '05.00', 'kegiatan' => 'Sorogan', 'urutan' => 3]);
        // ... lanjutkan isi semua jadwal di sini
    }
}