{{-- resources/views/program-category.blade.php --}}
@extends('layouts.app')

@section('title', $categoryTitle)

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-6 py-20">
        {{-- Breadcrumb Navigation --}}
        <nav class="text-sm mb-8" data-aos="fade-up">
            <a href="{{ route('home') }}" class="text-gray-500 hover:text-green-600">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('program.hub') }}" class="text-gray-500 hover:text-green-600">Program</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-semibold">{{ $categoryTitle }}</span>
        </nav>

        {{-- Header Halaman --}}
        <div class="mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">{{ $categoryTitle }}</h2>
        </div>
        
        @if($programs->isNotEmpty())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($programs as $program)
                    <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                        <a href="{{ route('program.show', $program->slug) }}" class="group block bg-gray-50 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden h-full">
                            @if($program->image)
                                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->nama }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <h4 class="text-xl font-semibold text-gray-800 group-hover:text-green-700 transition-colors">{{ $program->nama }}</h4>
                                @if($program->deskripsi)
                                    <p class="text-gray-600 mt-2">{{ Str::limit($program->deskripsi, 100) }}</p>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 py-16" data-aos="fade-up">
                <p class="text-lg">Belum ada program yang ditambahkan untuk kategori ini.</p>
                <a href="{{ route('program.hub') }}" class="mt-4 inline-block text-green-600 hover:underline">
                    ← Kembali ke semua kategori program
                </a>
            </div>
        @endif
    </div>
</div>
@endsection