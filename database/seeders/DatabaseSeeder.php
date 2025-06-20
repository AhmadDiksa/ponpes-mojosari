<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Header;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(PonpesContentSeeder::class);
        $this->call (ProfilKontenSeeder::class);
        // $this->call(PageContentSeeder::class);
       
        // Seeder header default jika belum ada
        // if (!Header::first()) {
        //     Header::create([
        //         'logo' => null,
        //         'title' => 'Ponpes Mojosari',
        //         'menus' => [
        //             [
        //                 'label' => 'Beranda',
        //                 'url' => route('home', absolute: false),
        //                 'sub_menus' => [],
        //             ],
        //             [
        //                 'label' => 'Profil',
        //                 'url' => route('profil', absolute: false),
        //                 'sub_menus' => [],
        //             ],
        //             [
        //                 'label' => 'Program',
        //                 'url' => null,
        //                 'sub_menus' => [
        //                     [ 'label' => 'Program Unggulan Pesantren', 'url' => route('program.category', 'program-pesantren', absolute: false) ],
        //                     [ 'label' => 'Pendidikan Formal', 'url' => route('program.category', 'pendidikan-formal', absolute: false) ],
        //                     [ 'label' => 'Ekstrakurikuler', 'url' => route('program.category', 'ekstrakulikuler', absolute: false) ],
        //                     [ 'label' => 'Lihat Semua Kategori →', 'url' => route('program.hub', absolute: false) ],
        //                 ],
        //             ],
        //             [
        //                 'label' => 'Kegiatan',
        //                 'url' => route('kegiatan', absolute: false),
        //                 'sub_menus' => [],
        //             ],
        //             [
        //                 'label' => 'Galeri',
        //                 'url' => route('galeri', absolute: false),
        //                 'sub_menus' => [],
        //             ],
        //             [
        //                 'label' => 'Berita',
        //                 'url' => route('berita.index', absolute: false),
        //                 'sub_menus' => [],
        //             ],
        //             [
        //                 'label' => 'PPDB',
        //                 'url' => route('ppdb.index', absolute: false),
        //                 'sub_menus' => [],
        //             ],
        //         ],
        //     ]);
        // }
    }
}