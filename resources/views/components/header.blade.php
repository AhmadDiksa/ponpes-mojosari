<header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            {{-- Logo & Nama Pesantren --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <img src="{{ $header && $header->logo ? asset('storage/' . $header->logo) : asset('images/logo.png') }}" alt="Logo Ponpes Mojosari" class="h-10 w-auto">
                <span class="hidden sm:block text-xl font-bold text-green-800">{{ $header && $header->title ? $header->title : 'Ponpes Mojosari' }}</span>
            </a>

            {{-- Navigasi Desktop (Terlihat di layar medium ke atas) --}}
            <div class="hidden md:flex items-center space-x-8">
                @if($header && is_array($header->menus) && count($header->menus))
                    @foreach($header->menus as $menu)
                        @if(isset($menu['sub_menus']) && is_array($menu['sub_menus']) && count($menu['sub_menus']))
                            <div x-data="{ dropdownOpen: false }" class="relative">
                                <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" class="flex items-center text-gray-600 hover:text-green-600 transition-colors duration-300">
                                    <span>{{ $menu['label'] ?? '-' }}</span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="dropdownOpen"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                                     x-transition:enter-end="opacity-100 transform translate-y-0"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 transform translate-y-0"
                                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                                     class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl z-20 overflow-hidden"
                                     style="display: none;">
                                    @foreach($menu['sub_menus'] as $sub)
                                        <a href="{{ $sub['url'] ?? '#' }}" class="block px-4 py-3 text-gray-800 hover:bg-green-50 transition-colors">{{ $sub['label'] ?? '-' }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $menu['url'] ?? '#' }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">{{ $menu['label'] ?? '-' }}</a>
                        @endif
                    @endforeach
                @else
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Beranda</a>
                    <a href="{{ route('profil') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Profil</a>
                    {{-- Dropdown Program --}}
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" class="flex items-center text-gray-600 hover:text-green-600 transition-colors duration-300">
                            <span>Program</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="dropdownOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-2"
                             class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl z-20 overflow-hidden"
                             style="display: none;">
                            <a href="{{ route('program.category', 'program-pesantren') }}" class="block px-4 py-3 text-gray-800 hover:bg-green-50 transition-colors">Program Unggulan Pesantren</a>
                            <a href="{{ route('program.category', 'pendidikan-formal') }}" class="block px-4 py-3 text-gray-800 hover:bg-green-50 transition-colors">Pendidikan Formal</a>
                            <a href="{{ route('program.category', 'ekstrakulikuler') }}" class="block px-4 py-3 text-gray-800 hover:bg-green-50 transition-colors">Ekstrakurikuler</a>
                            <div class="border-t border-gray-200"></div>
                            <a href="{{ route('program.hub') }}" class="block px-4 py-3 font-bold text-green-600 hover:bg-green-100 transition-colors text-sm">
                                Lihat Semua Kategori →
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('kegiatan') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Kegiatan</a>
                    <a href="{{ route('galeri') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Galeri</a>
                    <a href="{{ route('berita.index') }}" class="text-gray-600 hover:text-green-600 transition-colors duration-300">Berita</a>
                    <a href="{{ route('ppdb.index') }}" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition-all duration-300 shadow">PPDB</a>
                @endif
            </div>

            {{-- Tombol Hamburger (Hanya terlihat di mobile) --}}
            <div x-data="{ open: false }" class="md:hidden">
                <button @click="open = !open" id="menu-btn" type="button" class="z-40 block hamburger md:hidden focus:outline-none">
                    <span :class="{'open': open}" class="hamburger-top"></span>
                    <span :class="{'open': open}" class="hamburger-middle"></span>
                    <span :class="{'open': open}" class="hamburger-bottom"></span>
                </button>
                
                {{-- Menu Mobile --}}
                <div x-show="open" id="menu" class="absolute flex flex-col items-center self-end py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md rounded-lg">
                    <a href="{{ route('home') }}" class="hover:text-green-600">Beranda</a>
                    <a href="{{ route('profil') }}" class="hover:text-green-600">Profil</a>
                    <a href="{{ route('program.hub') }}" class="hover:text-green-600">Program</a>
                    <a href="{{ route('kegiatan') }}" class="hover:text-green-600">Kegiatan</a>
                    <a href="{{ route('galeri') }}" class="hover:text-green-600">Galeri</a>
                    <a href="{{ route('berita.index') }}" class="hover:text-green-600">Berita</a>
                    <a href="{{ route('ppdb.index') }}" class="hover:text-green-600">PPDB</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<style>
    .hamburger { cursor: pointer; width: 24px; height: 24px; transition: all 0.25s; position: relative; }
    .hamburger-top, .hamburger-middle, .hamburger-bottom { position: absolute; width: 24px; height: 3px; top: 0; left: 0; background: #166534; transform: rotate(0); transition: all 0.5s; border-radius: 2px;}
    .hamburger-middle { transform: translateY(7px); }
    .hamburger-bottom { transform: translateY(14px); }
    .open .hamburger-top { transform: rotate(45deg) translateY(6px) translateX(6px); }
    .open .hamburger-middle { display: none; }
    .open .hamburger-bottom { transform: rotate(-45deg) translateY(6px) translateX(-6px); }
</style>