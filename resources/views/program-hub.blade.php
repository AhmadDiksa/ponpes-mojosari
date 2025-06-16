{{-- resources/views/program-hub.blade.php --}}
@extends('layouts.app')
@section('title', 'Program & Pendidikan')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-6 py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Program & Pendidikan</h2>
            <p class="text-gray-500 mt-2 max-w-2xl mx-auto">Kami menyediakan beragam program yang dirancang untuk membangun fondasi iman, ilmu, dan karakter.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($categories as $slug => $details)
                <a href="{{ route('program.category', $slug) }}" class="group block bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="relative">
                        <img src="{{ asset($details['image']) }}" alt="{{ $details['title'] }}" class="w-full h-56 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 group-hover:text-green-700">{{ $details['title'] }}</h3>
                        <p class="text-gray-600 mt-2">{{ $details['description'] }}</p>
                        <span class="inline-block mt-4 text-green-600 font-semibold">
                            Lihat Selengkapnya →
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection