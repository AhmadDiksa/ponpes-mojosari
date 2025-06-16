{{-- resources/views/program-show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="bg-white py-20">
    <div class="container mx-auto px-6 max-w-4xl">
        <article>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-4" data-aos="fade-up">
                {{ $program->nama }}
            </h1>
            <div class="text-green-600 font-semibold mb-8" data-aos="fade-up" data-aos-delay="100">
                Kategori: {{ ucwords(str_replace('_', ' ', $program->kategori)) }}
            </div>

            @if($program->image)
                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->nama }}" class="w-full rounded-lg shadow-lg mb-12" data-aos="fade-up" data-aos-delay="200">
            @endif
            
            {{-- Tampilkan deskripsi program di sini. Gunakan class 'prose' jika deskripsi mengandung HTML --}}
            <div class="prose prose-lg max-w-none prose-green" data-aos="fade-up" data-aos-delay="300">
                {{-- Jika deskripsi adalah teks biasa --}}
                <p>{{ $program->deskripsi }}</p>

                {{-- Jika deskripsi Anda mengandung HTML dari Rich Editor, gunakan ini: --}}
                {{-- {!! $program->deskripsi !!} --}}
            </div>

            <div class="mt-12 pt-8 border-t" data-aos="fade-up">
                <a href="{{ route('program.hub') }}" class="inline-flex items-center text-green-600 font-semibold hover:underline">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Program
                </a>
            </div>
        </article>
    </div>
</div>
@endsection