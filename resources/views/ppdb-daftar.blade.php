{{-- resources/views/ppdb-daftar.blade.php --}}
@extends('layouts.app')

@section('title', 'Formulir Pendaftaran Online')

@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto px-4 sm:px-6 py-12 md:py-16">
        
        {{-- Header Halaman --}}
        <div class="text-center mb-10" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Formulir Pendaftaran Online</h2>
            <p class="text-gray-600 mt-2 max-w-2xl mx-auto">
                Silakan isi data dengan teliti. Setelah menekan "Kirim", data Anda akan langsung kami terima.
            </p>
            {{-- Link kembali ke halaman informasi --}}
            <a href="{{ route('ppdb.index') }}" class="mt-4 inline-flex items-center text-sm text-green-600 hover:underline">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Halaman Informasi PPDB
            </a>
        </div>

        {{-- Kontainer untuk Iframe --}}
        <div class="max-w-4xl mx-auto bg-white p-2 sm:p-4 rounded-xl shadow-2xl" data-aos="fade-up" data-aos-delay="200">
            <div class="w-full">
                <iframe 
                    src="https://docs.google.com/forms/d/e/1FAIpQLScsUH6Uk9CQk4F_DCfRmOuOmQ9tEhmN_toeVO-ckqtaRtxXOw/viewform?embedded=true" 
                    width="640" 
                    height="1410" 
                    frameborder="0" 
                    marginheight="0" marginwidth="0">
                    Memuat…
                </iframe>
            </div>
        </div>
        
    </div>
</div>
@endsection