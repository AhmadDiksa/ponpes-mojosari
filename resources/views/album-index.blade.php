@extends('layouts.app')
@section('title', 'Galeri Album')
@section('content')
<div class="bg-gray-50 py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold">Galeri Kegiatan</h2>
            <p class="text-gray-500 mt-2">Kumpulan momen berharga yang terdokumentasi dalam album.</p>
        </div>
        @if($albums->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($albums as $album)
                    <a href="{{ route('album.show', $album->slug) }}" class="group block bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}" class="w-full h-64 object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-6">
                                <div>
                                    <h3 class="text-2xl font-bold text-white">{{ $album->title }}</h3>
                                    <span class="text-sm text-green-300">{{ $album->photos_count }} Foto</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-16">{{ $albums->links() }}</div>
        @else
            <p class="text-center text-gray-500">Belum ada album yang dibuat.</p>
        @endif
    </div>
</div>
@endsection