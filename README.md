# Pondok Pesantren Mojosari - Website Resmi

Website ini adalah sistem informasi dan portal resmi Pondok Pesantren Mojosari, dibangun menggunakan Laravel 12, Filament Admin, TailwindCSS, dan Vite. Website ini menyediakan informasi profil, program pendidikan, berita, galeri, serta pendaftaran santri baru (PPDB) secara online.

Link Website: https://pesantrenputrikhbasthomi.com/
---

## Fitur Utama

### Publik
- **Beranda**: Hero slider, sambutan, program unggulan, dan CTA pendaftaran.
- **Profil**: Visi, misi, dan larangan pondok (dikelola via admin).
- **Jadwal Kegiatan**: Jadwal harian dan tambahan santri.
- **Program Pendidikan**: Daftar program unggulan, kategori, dan detail program.
- **Galeri**: Foto-foto kegiatan pondok.
- **Berita & Artikel**: Daftar dan detail berita/artikel terbaru.
- **PPDB Online**: Informasi dan formulir pendaftaran santri baru.

### Admin (Filament)
- **Manajemen Konten Halaman**: Visi, misi, larangan.
- **Manajemen Program Pendidikan**: Tambah/edit/hapus program dan kategori.
- **Manajemen Jadwal Kegiatan**: Atur jadwal harian & tambahan.
- **Manajemen Galeri**: Upload dan kelola foto.
- **Manajemen Berita**: Tulis, edit, dan publikasikan berita/artikel.
- **Manajemen Info PPDB**: Atur info dan prosedur pendaftaran.

---

## Instalasi & Setup

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & npm
- Database (MySQL, MariaDB, SQLite, dsb.)

### Langkah Instalasi
1. **Clone repository**
   ```bash
   git clone <repo-url> && cd ponpes-mojosari
   ```
2. **Install dependency backend**
   ```bash
   composer install
   ```
3. **Install dependency frontend**
   ```bash
   npm install
   ```
4. **Copy file environment**
   ```bash
   cp .env.example .env
   ```
5. **Generate app key**
   ```bash
   php artisan key:generate
   ```
6. **Atur konfigurasi database**
   - Edit `.env` dan sesuaikan DB_DATABASE, DB_USERNAME, DB_PASSWORD.
7. **Migrasi & seed database**
   ```bash
   php artisan migrate
   # (opsional) php artisan db:seed
   ```
8. **Jalankan server development**
   ```bash
   npm run dev
   # Di terminal lain:
   php artisan serve
   ```
   Akses di [http://localhost:8000](http://localhost:8000)

---

## Panel Admin (Filament)
- Akses: `/admin`
- Login menggunakan user yang sudah terdaftar (buat user via seeder/manual jika belum ada).
- Kelola konten: profil, program, jadwal, galeri, berita, info PPDB.

---

## Struktur Folder Penting
- `resources/views/` : Blade template halaman publik
- `app/Http/Controllers/` : Controller utama (LandingPageController)
- `app/Filament/Resources/` : Resource untuk admin panel
- `public/images/` : Gambar hero, galeri, logo, dsb.
- `routes/web.php` : Definisi rute publik
- `database/migrations/` : Struktur tabel database

---

## Kustomisasi & Pengembangan
- **CSS**: Edit di `resources/css/app.css` (gunakan Tailwind)
- **JS**: Edit di `resources/js/app.js`
- **Gambar**: Tambahkan di `public/images/`
- **Konfigurasi**: Ubah di `.env` atau file di `config/`

---

## FAQ & Troubleshooting
- **Error saat migrate?**
  - Pastikan database sudah dibuat & konfigurasi `.env` benar.
- **Aset tidak muncul?**
  - Jalankan `npm run dev` atau `npm run build`.
- **Login admin gagal?**
  - Pastikan user sudah ada di tabel `users`.
- **Ingin reset data?**
  - Jalankan `php artisan migrate:fresh --seed` (data akan hilang!)

---

## Kontribusi
Pull request & issue sangat terbuka untuk pengembangan lebih lanjut.

---

## Lisensi
MIT. Lihat file LICENSE.
