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
                <h3 class="text-2xl font-bold text-white mb-4">Pondok Pesantren Mojosari</h3>
                
                {{-- Alamat --}}
                <div class="flex items-start mt-4">
                    <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>Dsn. Mojosari, Ds. Ngepeh, Kec. Loceret, <br>Kab. Nganjuk, Jawa Timur 64471</span>
                </div>
                
                {{-- Telepon --}}
                <div class="flex items-start mt-4">
                    <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <span>0858 5506 2194</span>
                </div>
                
                {{-- Media Sosial --}}
                <div class="mt-8">
                    <h4 class="text-lg font-semibold text-white mb-3">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/ppmojosari/" target="_blank" aria-label="Instagram" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 012.792 2.792c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-2.792 2.792c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-2.792-2.792c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 012.792-2.792c.636-.247 1.363.416 2.427.465C9.53 2.013 9.884 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0-2a7 7 0 110 14 7 7 0 010-14zm4.5-1.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="https://www.facebook.com/p/PP-Mojosari-Nganjuk-100064524231073/" target="_blank" aria-label="Facebook" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
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
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"> 
//     let elemen = document.getElementsByClassName("tes");

// // Contoh akses elemen pertama
// console.log(elemen[0]);</script>
</body>
</html>