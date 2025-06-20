@extends('layouts.app')

@section('title', 'Visi & Misi')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-6 py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Visi & Misi</h2>
            <p class="text-gray-500 mt-2">Arah dan tujuan Pondok Pesantren Mojosari dalam mencetak generasi unggul.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-start">
            {{-- Kolom Kiri untuk Visi --}}
            <div class="space-y-12" data-aos="fade-right">
                <div class="bg-green-50 p-8 rounded-lg shadow-md">
                    <h3 class="text-3xl font-bold mb-6 text-green-700">Visi</h3>
                    @if($visi->isNotEmpty())
                        <ul class="space-y-4 text-gray-700">
                            @foreach($visi as $item)
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 mr-3 text-green-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>{{ $item->konten }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 italic">Konten visi belum tersedia.</p>
                    @endif
                </div>
            </div>

            {{-- Kolom Kanan untuk Misi --}}
            <div data-aos="fade-left" data-aos-delay="200">
                <div class="bg-green-50 p-8 rounded-lg shadow-md">
                    <h3 class="text-3xl font-bold mb-6 text-green-700">Misi</h3>
                    @if($misi->isNotEmpty())
                        <ul class="space-y-4 text-gray-700">
                            @foreach($misi as $item)
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 mr-3 text-green-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>{{ $item->konten }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 italic">Konten misi belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
