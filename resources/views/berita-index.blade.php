@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-6 py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Berita & Artikel</h2>
            <p class="text-gray-500 mt-2">Informasi dan kegiatan terbaru dari Pondok Pesantren Mojosari.</p>
        </div>

        @if($beritas->isNotEmpty())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($beritas as $berita)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                        <a href="{{ route('berita.show', $berita->slug) }}">
                            <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->title }}" class="w-full h-56 object-cover">
                        </a>
                        <div class="p-6">
                            <span class="text-sm text-gray-500">{{ $berita->published_at->format('d M Y') }}</span>
                            <h3 class="text-xl font-bold mt-2 mb-3 text-gray-800">
                                <a href="{{ route('berita.show', $berita->slug) }}" class="hover:text-green-700">{{ $berita->title }}</a>
                            </h3>
                            <p class="text-gray-600 leading-relaxed">{{ Str::limit(strip_tags($berita->content), 120) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Link Paginasi --}}
            <div class="mt-16">
                {{ $beritas->links() }}
            </div>
        @else
            <div class="text-center py-16" data-aos="fade-up">
                <p class="text-gray-500 text-lg">Belum ada berita yang dipublikasikan.</p>
            </div>
        @endif
    </div>
</div>
@endsection