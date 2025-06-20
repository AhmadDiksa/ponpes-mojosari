<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Visi
        PageContent::updateOrCreate(
            ['section_name' => 'visi'],
            [
                'content' => [
                    'Membentuk santri yang beriman, bertaqwa, dan berakhlak mulia',
                    'Mengembangkan potensi santri dalam bidang akademik dan non-akademik',
                    'Mempersiapkan santri menjadi pemimpin masa depan yang berkualitas',
                    'Mengintegrasikan pendidikan agama dengan pendidikan umum'
                ]
            ]
        );

        // Data Misi
        PageContent::updateOrCreate(
            ['section_name' => 'misi'],
            [
                'content' => [
                    'Menyelenggarakan pendidikan yang berkualitas dengan mengintegrasikan kurikulum nasional dan pesantren',
                    'Mengembangkan karakter islami melalui pembiasaan ibadah dan akhlak mulia',
                    'Mengoptimalkan potensi santri melalui berbagai program unggulan',
                    'Membangun kerjasama dengan berbagai pihak untuk meningkatkan kualitas pendidikan',
                    'Menciptakan lingkungan belajar yang kondusif dan aman'
                ]
            ]
        );

        // Data Larangan
        PageContent::updateOrCreate(
            ['section_name' => 'larangan'],
            [
                'content' => [
                    'Dilarang membawa dan menggunakan handphone tanpa izin',
                    'Dilarang keluar dari area pesantren tanpa izin',
                    'Dilarang membawa makanan dari luar tanpa izin',
                    'Dilarang merokok, minum minuman beralkohol, dan menggunakan narkoba',
                    'Dilarang melakukan tindakan kekerasan atau bullying',
                    'Dilarang membawa senjata tajam atau benda berbahaya',
                    'Dilarang melakukan tindakan asusila',
                    'Dilarang mencoret-coret atau merusak fasilitas pesantren',
                    'Dilarang membawa tamu tanpa izin',
                    'Dilarang tidur di luar jam yang ditentukan'
                ]
            ]
        );

        // Data Sejarah
        PageContent::updateOrCreate(
            ['section_name' => 'sejarah'],
            [
                'content' => '<h2>Sejarah Pondok Pesantren Mojosari</h2>
                
                <p>Pondok Pesantren Mojosari didirikan pada tahun 1985 oleh KH. Ahmad Dahlan dengan visi untuk menciptakan lembaga pendidikan yang mengintegrasikan nilai-nilai Islam dengan pendidikan modern.</p>
                
                <h3>Awal Mula</h3>
                <p>Berawal dari sebuah musholla kecil di desa Mojosari, pesantren ini mulai dengan hanya 15 santri. Dengan tekad yang kuat dan dukungan masyarakat sekitar, pesantren ini terus berkembang dari tahun ke tahun.</p>
                
                <h3>Perkembangan</h3>
                <p>Pada tahun 1995, pesantren ini mulai membuka program pendidikan formal dengan mendirikan Madrasah Tsanawiyah. Kemudian pada tahun 2000, didirikan Madrasah Aliyah untuk melanjutkan pendidikan tingkat menengah atas.</p>
                
                <p>Seiring berjalannya waktu, pesantren ini terus menambah berbagai program unggulan seperti tahfidz Al-Qur\'an, program bahasa Arab dan Inggris, serta berbagai ekstrakurikuler yang mendukung pengembangan bakat santri.</p>
                
                <h3>Pencapaian</h3>
                <p>Saat ini, Pondok Pesantren Mojosari telah memiliki lebih dari 500 santri dengan berbagai prestasi di tingkat regional maupun nasional. Pesantren ini telah meluluskan ribuan alumni yang tersebar di berbagai perguruan tinggi ternama dan telah berkontribusi positif bagi masyarakat.</p>
                
                <h3>Visi Ke Depan</h3>
                <p>Pondok Pesantren Mojosari berkomitmen untuk terus mengembangkan kualitas pendidikan dan menjadi salah satu pesantren terdepan dalam menghasilkan generasi muda yang beriman, berilmu, dan berkontribusi positif bagi bangsa dan negara.</p>'
            ]
        );
    }
} 