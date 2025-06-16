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
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                {{-- Kolom 1: Tentang --}}
                <div data-aos="fade-up">
                    <h3 class="text-xl font-bold mb-4">Pondok Pesantren Mojosari</h3>
                    <p class="text-gray-400">Mencetak generasi berjiwa nasionalisme, cerdas, berdikari, serta kreatif berlandaskan Ahlus Sunnah Wal Jama'ah.</p>
                </div>
                {{-- Kolom 2: Kontak --}}
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-xl font-bold mb-4">Kontak Kami</h3>
                    <p class="text-gray-400">Dsn. Mojosari, Ds. Ngepeh, Kec. Loceret, Kab. Nganjuk 64471</p>
                    <p class="text-gray-400 mt-2">Telp: 0858 5506 2194</p>
                </div>
                {{-- Kolom 3: Media Sosial --}}
                <div data-aos="fade-up" data-aos-delay="400">
                    <h3 class="text-xl font-bold mb-4">Ikuti Kami</h3>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="https://www.instagram.com/ppmojosari/" target="_blank" class="text-gray-400 hover:text-white transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 012.792 2.792c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-2.792 2.792c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-2.792-2.792c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 012.792-2.792c.636-.247 1.363-.416 2.427-.465C9.53 2.013 9.884 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0-2a7 7 0 110 14 7 7 0 010-14zm4.5-1.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" /></svg></a>
                        <a href="https://www.facebook.com/p/PP-Mojosari-Nganjuk-100064524231073/" target="_blank" class="text-gray-400 hover:text-white transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-500">
                <p>© {{ date('Y') }} Pondok Pesantren Mojosari. All Rights Reserved.</p>
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