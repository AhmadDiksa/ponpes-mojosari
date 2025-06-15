@extends('layouts.app')

@section('content')

{{-- 1. Hero Section --}}
<section class="relative h-[calc(100vh-80px)] bg-cover bg-center flex items-center justify-center text-white" style="background-image: url('{{ asset('images/hero-background.jpg') }}');">
    {{-- Overlay Gelap --}}
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
    
    <div class="relative container mx-auto px-6 text-center z-10">
        <div data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 leading-tight text-shadow-lg">
                Pondok Pesantren Mojosari
            </h1>
            <p class="text-lg md:text-xl max-w-3xl mx-auto text-gray-200">
                Mencetak Generasi Qur'ani yang Berakhlakul Karimah, Cerdas, dan Berwawasan Kebangsaan.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('ppdb') }}" class="w-full sm:w-auto inline-block bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition-all duration-300 shadow-lg transform hover:scale-105">
                    Daftar Sekarang
                </a>
                <a href="{{ route('profil') }}" class="w-full sm:w-auto inline-block bg-white/20 backdrop-blur-sm text-white px-8 py-3 rounded-full font-semibold hover:bg-white/30 transition-all duration-300">
                    Kenali Kami Lebih Dekat
                </a>
            </div>
        </div>
    </div>
</section>

{{-- 2. Section Sambutan / Tentang Kami (Singkat) --}}
<section class="bg-white py-20">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <img src="{{ asset('images/santribelajar.jpg') }}" alt="Santri Belajar" class="rounded-lg shadow-xl w-full">
            </div>
            <div data-aos="fade-left">
                <span class="text-green-600 font-semibold">Selamat Datang</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">Membangun Fondasi Iman dan Ilmu</h2>
                <p class="text-gray-600 leading-relaxed">
                    Di Pondok Pesantren Mojosari, kami berkomitmen untuk menyediakan lingkungan pendidikan yang kondusif, di mana para santri tidak hanya mendalami ilmu agama, tetapi juga dibekali dengan pengetahuan umum dan keterampilan teknologi. Visi kami adalah membentuk lulusan yang siap menghadapi tantangan zaman dengan iman yang kokoh dan akhlak yang mulia.
                </p>
                <a href="{{ route('profil') }}" class="mt-6 inline-flex items-center text-green-600 font-semibold hover:underline">
                    Lihat Visi & Misi Kami
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- 3. Section Program Unggulan (Cuplikan) --}}
<section class="bg-gray-50 py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Program Unggulan Kami</h2>
            <p class="text-gray-500 mt-2">Fokus kami dalam pengembangan potensi santri.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Kartu 1 --}}
            <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-green-100 text-green-600 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-9.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Pendidikan Diniyah</h3>
                <p class="text-gray-600">Pendalaman kitab-kitab klasik dan ilmu agama yang komprehensif.</p>
            </div>
            {{-- Kartu 2 --}}
            <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-blue-100 text-blue-600 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-6">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Kejuruan Teknologi</h3>
                <p class="text-gray-600">Pembekalan skill di bidang Multimedia dan RPL untuk masa depan.</p>
            </div>
            {{-- Kartu 3 --}}
            <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-red-100 text-red-600 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-6">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Tahfidzil Qur'an</h3>
                <p class="text-gray-600">Program menghafal Al-Qur'an dengan bimbingan intensif.</p>
            </div>
        </div>
        <div class="text-center mt-12">
             <a href="{{ route('program') }}" class="inline-block bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition-all duration-300 shadow-lg transform hover:scale-105">
                Lihat Semua Program
            </a>
        </div>
    </div>
</section>

{{-- 4. Section Call to Action (CTA) --}}
<section class="bg-green-700 text-white">
    <div class="container mx-auto px-6 py-16">
        <div class="text-center" data-aos="zoom-in">
            <h2 class="text-3xl font-bold">Siap Menjadi Bagian dari Keluarga Besar Kami?</h2>
            <p class="max-w-2xl mx-auto mt-4 text-green-200">
                Bergabunglah dengan ribuan santri lainnya untuk menimba ilmu dan meraih masa depan yang gemilang bersama Pondok Pesantren Mojosari.
            </p>
            <a href="{{ route('ppdb') }}" class="mt-8 inline-block bg-white text-green-700 px-8 py-3 rounded-full font-bold hover:bg-green-100 transition-all duration-300 shadow-lg transform hover:scale-105">
                Lihat Prosedur Pendaftaran
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .text-shadow-lg {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
    }
</style>
@endpush