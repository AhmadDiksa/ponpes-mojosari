{{-- resources/views/profil-larangan.blade.php --}}
@extends('layouts.app')

@section('title', 'Tata Tertib & Larangan')

@section('content')
<div class="bg-red-50 py-20">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-red-800">Tata Tertib & Larangan</h1>
            <p class="text-lg text-red-600 mt-2">Untuk menjaga lingkungan yang kondusif, aman, dan disiplin demi kelancaran proses belajar.</p>
        </div>
        
        @if($larangan->isNotEmpty())
            <div class="bg-white p-8 md:p-10 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <ul class="space-y-5 text-gray-800">
                    @foreach($larangan as $item)
                        <li class="flex items-start">
                            <svg class="w-6 h-6 mr-4 text-red-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                            <span class="text-lg">{{ $item->konten }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
             <div class="text-center py-16">
                 <p class="text-gray-500 text-lg">Konten tata tertib dan larangan belum tersedia.</p>
            </div>
        @endif
    </div>
</div>
@endsection