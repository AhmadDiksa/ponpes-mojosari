@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-6 py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Galeri Kegiatan</h2>
            <p class="text-gray-500 mt-2">Momen-momen berharga di Pondok Pesantren Mojosari.</p>
        </div>

        @if($photos->isNotEmpty())
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach($photos as $photo)
                    <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}">
                        {{-- Kita akan tambahkan fungsionalitas lightbox di sini nanti --}}
                        <a href="{{ asset('storage/' . $photo->image_path) }}" data-fancybox="gallery" data-caption="{{ $photo->title }}">
                            <img src="{{ asset('storage/' . $photo->image_path) }}" 
                                 alt="{{ $photo->title }}" 
                                 class="rounded-lg object-cover w-full h-full aspect-square shadow-md hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16" data-aos="fade-up">
                <p class="text-gray-500 text-lg">Belum ada foto di galeri.</p>
            </div>
        @endif
    </div>
</div>
@endsection