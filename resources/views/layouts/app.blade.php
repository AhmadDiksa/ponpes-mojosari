<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok Pesantren Mojosari</title>
    
    {{-- Font Google (Opsional, untuk estetika) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Fancybox CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    {{-- Tailwind CSS --}}
    {{-- Vite akan otomatis memasukkan CSS dan JS --}}
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style> 
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    
    {{-- Memanggil komponen Header --}}
    <x-header />

    {{-- Konten Utama dari Halaman Spesifik --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-gray-300">
    <div class="container mx-auto px-6 py-12">
        {{-- Grid untuk konten dan peta --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            {{-- Kolom Kiri: Informasi Kontak & Sosial Media --}}
            <div data-aos="fade-right">
                <h3 class="text-2xl font-bold text-white mb-4">{{ $footer->title ?? 'Pondok Pesantren Mojosari' }}</h3>
                
                {{-- Alamat --}}
                <div class="flex items-start mt-4">
                    <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>{{ $footer->address ?? 'Dsn. Mojosari, Ds. Ngepeh, Kec. Loceret, Kab. Nganjuk, Jawa Timur 64471' }}</span>
                </div>
                
                {{-- Telepon --}}
                <div class="flex items-start mt-4">
                    <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <span>{{ $footer->phone ?? '0858 5506 2194' }}</span>
                </div>
                
                {{-- Media Sosial --}}
                <div class="mt-8">
                    <h4 class="text-lg font-semibold text-white mb-3">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        {{-- WhatsApp --}}
                        @php
                            $waUrl = $footer->wa_url ?? 'https://wa.me/6285855062194';
                        @endphp
                        <a href="{{ $waUrl }}" target="_blank" aria-label="WhatsApp" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A12.07 12.07 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.22-1.63A12.07 12.07 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.21-1.25-6.23-3.48-8.52zM12 22c-1.85 0-3.68-.5-5.26-1.44l-.38-.22-3.69.97.99-3.59-.25-.37A9.94 9.94 0 0 1 2 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.47-7.14c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.27-.47-2.42-1.5-.9-.8-1.5-1.77-1.67-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.5-.5-.67-.5-.17 0-.37-.02-.57-.02-.2 0-.52.07-.8.37-.27.3-1.05 1.02-1.05 2.5 0 1.48 1.08 2.91 1.23 3.11.15.2 2.13 3.25 5.17 4.43.72.25 1.28.4 1.72.51.72.18 1.38.15 1.9.09.58-.07 1.77-.72 2.02-1.41.25-.7.25-1.3.17-1.41-.08-.11-.28-.18-.58-.33z"/></svg>
                        </a>
                        {{-- Facebook --}}
                        @php
                            $fbUrl = $footer->fb_url ?? 'https://www.facebook.com/p/PP-Mojosari-Nganjuk-100064524231073/';
                        @endphp
                        <a href="{{ $fbUrl }}" target="_blank" aria-label="Facebook" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                        </a>
                        {{-- Tambahan dari database (misal Instagram, dst) --}}
                        @if($footer && is_array($footer->socials))
                            @foreach($footer->socials as $social)
                                @php
                                    $icon = '';
                                    if(($social['icon'] ?? '') == 'instagram') {
                                        $icon = '<svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 012.792 2.792c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-2.792 2.792c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-2.792-2.792c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 012.792-2.792c.636-.247 1.363.416 2.427.465C9.53 2.013 9.884 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0-2a7 7 0 110 14 7 7 0 010-14zm4.5-1.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"/></svg>';
                                    } elseif(($social['icon'] ?? '') == 'twitter') {
                                        $icon = '<svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0022.4.36a9.09 9.09 0 01-2.88 1.1A4.52 4.52 0 0016.11 0c-2.63 0-4.77 2.14-4.77 4.77 0 .37.04.73.12 1.08C7.69 5.7 4.07 3.8 1.64.9c-.41.7-.65 1.52-.65 2.4 0 1.66.85 3.13 2.15 3.99A4.48 4.48 0 01.96 6.1v.06c0 2.32 1.65 4.25 3.95 4.69-.4.11-.82.17-1.25.17-.31 0-.6-.03-.89-.08.6 1.87 2.34 3.23 4.4 3.27A9.05 9.05 0 010 19.54a12.8 12.8 0 006.92 2.03c8.3 0 12.85-6.88 12.85-12.85 0-.2 0-.39-.01-.58A9.22 9.22 0 0023 3z"/></svg>';
                                    } elseif(($social['icon'] ?? '') == 'youtube') {
                                        $icon = '<svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a2.994 2.994 0 0 0-2.112-2.112C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.386.574a2.994 2.994 0 0 0-2.112 2.112C0 8.072 0 12 0 12s0 3.928.502 5.814a2.994 2.994 0 0 0 2.112 2.112C4.5 20.5 12 20.5 12 20.5s7.5 0 9.386-.574a2.994 2.994 0 0 0 2.112-2.112C24 15.928 24 12 24 12s0-3.928-.502-5.814zM9.75 15.5v-7l6.5 3.5-6.5 3.5z"/></svg>';
                                    } elseif(($social['icon'] ?? '') == 'tiktok') {
                                        $icon = '<svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12.75 2v14.25a2.25 2.25 0 1 1-2.25-2.25h.75V12h-.75a4.5 4.5 0 1 0 4.5 4.5V2h-2.25z"/></svg>';
                                    } elseif(($social['icon'] ?? '') == 'linkedin') {
                                        $icon = '<svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11 19h-3v-9h3v9zm-1.5-10.28c-.97 0-1.75-.79-1.75-1.75s.78-1.75 1.75-1.75 1.75.79 1.75 1.75-.78 1.75-1.75 1.75zm13.5 10.28h-3v-4.5c0-1.08-.02-2.47-1.5-2.47-1.5 0-1.73 1.18-1.73 2.39v4.58h-3v-9h2.89v1.23h.04c.4-.75 1.38-1.54 2.84-1.54 3.04 0 3.6 2 3.6 4.59v4.72z"/></svg>';
                                    }
                                @endphp
                                <a href="{{ $social['url'] ?? '#' }}" target="_blank" aria-label="{{ $social['name'] ?? '' }}" class="text-gray-400 hover:text-white transition-colors">
                                    {!! $icon !!}
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Peta Lokasi --}}
            <div class="rounded-lg overflow-hidden shadow-xl" data-aos="fade-left">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7908.2415048580015!2d111.88508218619907!3d-7.670165336496151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784d0ad1ef059b%3A0x583b707a9dc76a90!2sYayasan%20Al-Mardliyah%20Pondok%20Pesantren%20Mojosari!5e0!3m2!1sid!2sid!4v1750059023399!5m2!1sid!2sid"
                    class="w-full h-full min-h-[300px] border-0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>

        {{-- Copyright di bawah --}}
        <div class="mt-12 pt-8 border-t border-gray-700 text-center text-gray-500">
            <p>{{ $footer->copyright ?? ('© ' . date('Y') . ' Pondok Pesantren Mojosari. All Rights Reserved.') }}</p>
        </div>
    </div>
</footer>
    {{-- Fancybox JS --}}
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        // Inisialisasi Fancybox
        document.addEventListener('DOMContentLoaded', () => {
            Fancybox.bind("[data-fancybox]", {
                // Opsi kustom Anda bisa ditaruh di sini
            });
        });
    </script>

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>