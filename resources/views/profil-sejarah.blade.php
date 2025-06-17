@extends('layouts.app')
@section('title', 'Sejarah Pondok Pesantren')

@section('content')
<div class="bg-white py-20">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Sejarah Singkat</h1>
            <p class="text-lg text-gray-500 mt-2">Perjalanan Pondok Pesantren Mojosari</p>
        </div>
        
        @if($sejarah && $sejarah->content)
            <article class="prose prose-lg max-w-none prose-green">
                {!! $sejarah->content !!}
            </article>
        @else
            <p class="text-center text-gray-500">Konten sejarah belum tersedia.</p>
        @endif
    </div>
</div>
@endsection