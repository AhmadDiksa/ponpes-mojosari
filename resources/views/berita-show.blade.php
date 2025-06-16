@extends('layouts.app')

@section('content')
<div class="bg-white py-20">
    <div class="container mx-auto px-6 max-w-4xl">
        <article>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-4" data-aos="fade-up">
                {{ $berita->title }}
            </h1>
            <div class="text-gray-500 mb-8" data-aos="fade-up" data-aos-delay="100">
                <span>Oleh: {{ $berita->author->name }}</span>
                <span class="mx-2">•</span>
                <span>Dipublikasikan pada {{ $berita->published_at->format('d F Y') }}</span>
            </div>

            @if($berita->thumbnail)
                <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->title }}" class="w-full rounded-lg shadow-lg mb-12" data-aos="fade-up" data-aos-delay="200">
            @endif
            
            {{-- Konten artikel akan dirender di sini --}}
            <div class="prose prose-lg max-w-none prose-green" data-aos="fade-up" data-aos-delay="300">
                {!! $berita->content !!}
            </div>
        </article>
    </div>
</div>
@endsection