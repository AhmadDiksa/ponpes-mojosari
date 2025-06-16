
<header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            {{-- Logo & Nama Pesantren --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                {{-- Ganti dengan tag <img> untuk logo Anda --}}
                <img src="{{ asset('images/logo.png') }}" alt="Logo Ponpes Mojosari" class="h-10 w-auto">
                <span class="text-xl font-bold text-green-800">Ponpes Mojosari</span>
            </a>

            {{-- Navigasi Desktop (Terlihat di layar medium ke atas) --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Beranda</a>
                <a href="{{ route('berita.index') }}" class="text-gray-600 hover:text-green-600 ...">Berita</a>
                <a href="{{ route('profil') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Profil</a>
                <a href="{{ route('kegiatan') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Kegiatan</a>
                <a href="{{ route('program') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Program</a>
                <a href="{{ route('galeri') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Galeri</a> 
                <a href="{{ route('ppdb') }}" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition-all duration-300 shadow">PPDB</a>
            </div>

            {{-- Tombol Hamburger (Hanya terlihat di mobile) --}}
            <div class="md:hidden">
                <button id="menu-btn" type="button" class="z-40 block hamburger md:hidden focus:outline-none">
                    <span class="hamburger-top"></span>
                    <span class="hamburger-middle"></span>
                    <span class="hamburger-bottom"></span>
                </button>
            </div>
        </div>

        {{-- Menu Mobile --}}
        <div id="menu" class="hidden md:hidden">
            <div class="absolute flex flex-col items-center self-end py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md rounded-lg">
                <a href="{{ route('home') }}" class="hover:text-green-600">Beranda</a>
                <a href="{{ route('berita.index') }}" class="hover:text-green-600">Berita</a>
                <a href="{{ route('profil') }}" class="hover:text-green-600">Profil</a>
                <a href="{{ route('kegiatan') }}" class="hover:text-green-600">Kegiatan</a>
                <a href="{{ route('program') }}" class="hover:text-green-600">Program</a>
                <a href="{{ route('galeri') }}" class="hover:text-green-600">Galeri</a>
                <a href="{{ route('ppdb') }}" class="hover:text-green-600">PPDB</a>
            </div>
        </div>
    </nav>
</header>

{{-- CSS & JS untuk Hamburger --}}
<style>
    .hamburger { cursor: pointer; width: 24px; height: 24px; transition: all 0.25s; position: relative; }
    .hamburger-top, .hamburger-middle, .hamburger-bottom { position: absolute; width: 24px; height: 3px; top: 0; left: 0; background: #166534; transform: rotate(0); transition: all 0.5s; border-radius: 2px;}
    .hamburger-middle { transform: translateY(7px); }
    .hamburger-bottom { transform: translateY(14px); }
    .open .hamburger-top { transform: rotate(45deg) translateY(6px) translateX(6px); }
    .open .hamburger-middle { display: none; }
    .open .hamburger-bottom { transform: rotate(-45deg) translateY(6px) translateX(-6px); }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('menu');
        btn.addEventListener('click', () => {
            btn.classList.toggle('open');
            menu.classList.toggle('hidden');
        });
    });
</script>