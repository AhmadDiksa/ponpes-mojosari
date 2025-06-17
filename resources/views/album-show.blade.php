@extends('layouts.app')
@section('title', 'Album: ' . $album->title)
@section('content')
<div class="bg-white py-20">
    <div class="container mx-auto px-6">
        <nav class="text-sm mb-8"><a href="{{ route('galeri.index') }}" class="text-gray-500 hover:text-green-600">← Kembali ke Daftar Album</a></nav>
        <div class="mb-12">
            <h2 class="text-4xl font-bold">{{ $album->title }}</h2>
            <p class="text-gray-600 mt-2">{{ $album->description }}</p>
        </div>
        @if($photos->isNotEmpty())
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($photos as $photo)
                    <div>
                        <a href="{{ asset('storage/' . $photo->image_path) }}" data-fancybox="gallery-{{ $album->slug }}" data-caption="{{ $photo->title }}">
                            <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" class="rounded-lg object-cover w-full h-full aspect-square shadow-md hover:shadow-xl transform hover:scale-105 transition-all">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-16">{{ $photos->links() }}</div>
        @else
            <p class="text-center text-gray-500">Belum ada foto di dalam album ini.</p>
        @endif
    </div>
</div>
@endsection