@extends('layouts.app')
@section('title', 'Tata Tertib & Larangan')

@section('content')
<div class="bg-red-50 py-20">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-red-800">Tata Tertib & Larangan</h1>
            <p class="text-lg text-red-600 mt-2">Untuk menjaga lingkungan yang kondusif, aman, dan disiplin.</p>
        </div>
        
        @if($larangan && !empty(json_decode($larangan->content)))
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <ul class="space-y-4 text-gray-700">
                    @foreach(json_decode($larangan->content) as $item)
                        <li class="flex items-start">
                            <svg class="w-6 h-6 mr-3 text-red-500 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="text-center text-gray-500">Konten larangan belum tersedia.</p>
        @endif
    </div>
</div>
@endsection