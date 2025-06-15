@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-6 py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Profil Pesantren</h2>
            <p class="text-gray-500 mt-2">Mengenal lebih dekat Visi & Misi kami.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-start">
            {{-- Kolom Kiri --}}
            <div class="space-y-12">
                <div data-aos="fade-right">
                    <h3 class="text-2xl font-semibold mb-4 text-green-700">Visi</h3>
                    @if($visi && !empty(json_decode($visi->content)))
                        <ul class="space-y-3 text-gray-600">
                            @foreach(json_decode($visi->content) as $item)
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Data visi belum tersedia.</p>
                    @endif
                </div>

                <div data-aos="fade-right" data-aos-delay="200">
                    <h3 class="text-2xl font-semibold mb-4 text-red-700">Larangan</h3>
                     @if($larangan && !empty(json_decode($larangan->content)))
                        <ul class="space-y-3 text-gray-600">
                            @foreach(json_decode($larangan->content) as $item)
                                <li class="flex items-start">
                                     <svg class="w-5 h-5 mr-3 text-red-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Data larangan belum tersedia.</p>
                    @endif
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div data-aos="fade-left" class="bg-green-50 p-8 rounded-lg">
                <h3 class="text-2xl font-semibold mb-4 text-green-700">Misi</h3>
                 @if($misi && !empty(json_decode($misi->content)))
                    <ul class="space-y-3 text-gray-600">
                        @foreach(json_decode($misi->content) as $item)
                             <li class="flex items-start">
                                <svg class="w-5 h-5 mr-3 text-green-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Data misi belum tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection