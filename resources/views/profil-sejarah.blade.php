{{-- resources/views/profil-sejarah.blade.php --}}
@extends('layouts.app')

@section('title', 'Sejarah Pondok Pesantren')

@section('content')
<div class="bg-white py-20">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-gray-800">Sejarah Singkat</h1>
            <p class="text-lg text-gray-500 mt-2">Perjalanan dan Perkembangan Pondok Pesantren Mojosari</p>
        </div>
        
        @if($sejarah->isNotEmpty())
            {{-- Class 'prose' dari plugin @tailwindcss/typography akan otomatis menata H1, p, ul, dll. --}}
            <article class="prose prose-lg max-w-none prose-green" data-aos="fade-up" data-aos-delay="200">
                @foreach($sejarah as $paragraf)
                    {!! $paragraf->konten !!}
                @endforeach
            </article>
        @else
            <div class="text-center py-16">
                 <p class="text-gray-500 text-lg">Konten sejarah belum tersedia.</p>
            </div>
        @endif
    </div>
</div>
@endsection