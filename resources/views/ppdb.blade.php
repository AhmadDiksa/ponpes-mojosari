@extends('layouts.app')

@section('title', 'Penerimaan Santri Baru')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-6 py-20">
        {{-- Header Halaman --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Penerimaan Santri Baru</h2>
            <p class="text-gray-500 mt-2 max-w-2xl mx-auto">Informasi lengkap dan formulir pendaftaran online untuk tahun ajaran 2025/2026.</p>
        </div>

        {{-- =============================================== --}}
        {{-- BLOK TOMBOL DAFTAR (PENGGANTI Iframe) --}}
        {{-- =============================================== --}}
            <section id="call-to-action-daftar" class="text-center py-10" data-aos="fade-up" data-aos-delay="400">
                <h3 class="text-2xl font-bold text-gray-800">Sudah Membaca Semua Informasi?</h3>
                <p class="text-gray-600 mt-2 mb-6">Lanjutkan ke halaman pendaftaran untuk mengisi formulir online.</p>
                <a href="{{ route('ppdb.daftar') }}" 
                   class="inline-block bg-green-600 text-white font-bold text-lg px-10 py-4 rounded-lg shadow-lg hover:bg-green-700 transform hover:scale-105 transition-all duration-300">
                    Buka Formulir Pendaftaran
                </a>
            </section>
       
        {{-- Kontainer untuk semua informasi --}}
        <div class="max-w-4xl mx-auto space-y-12">
            
            {{-- Bagian: Ketentuan Umum --}}
            @if(isset($ppdbInfos['ketentuan_umum']))
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-4 text-green-700">Ketentuan Umum</h3>
                <ul class="list-decimal list-inside space-y-2 text-gray-700">
                    @foreach($ppdbInfos['ketentuan_umum'] as $info)
                    <li>
                        <strong>{{ $info->judul }}:</strong>
                        @if($info->deskripsi)
                        <span class="ml-2">{{ $info->deskripsi }}</span>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Bagian: Syarat Pendaftaran --}}
            @if(isset($ppdbInfos['syarat_pendaftaran']))
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-2xl font-bold mb-4 text-green-700">Syarat Pendaftaran</h3>
                <ul class="list-decimal list-inside space-y-3 text-gray-700">
                     @foreach($ppdbInfos['syarat_pendaftaran'] as $info)
                    <li>
                        {{ $info->judul }}
                        @if($info->deskripsi)
                        <span class="text-sm text-gray-500 block ml-6 italic">- {{ $info->deskripsi }}</span>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            {{-- Bagian: Rincian Biaya --}}
            @if(isset($ppdbInfos['biaya']))
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-2xl font-bold mb-6 text-green-700">Rincian Biaya</h3>
                <div class="space-y-4">
                    @php $total = 0; @endphp
                    @foreach($ppdbInfos['biaya'] as $biaya)
                    <div class="flex justify-between items-center border-b pb-2">
                        <span class="text-gray-700">{{ $biaya->judul }}</span>
                        <span class="font-semibold text-gray-800">Rp {{ number_format((int)$biaya->nilai, 0, ',', '.') }},-</span>
                    </div>
                    @php $total += (int)$biaya->nilai; @endphp
                    @endforeach
                    <div class="flex justify-between items-center pt-4 border-t-2 border-green-600">
                        <span class="font-bold text-lg text-green-800">TOTAL BIAYA AWAL</span>
                        <span class="font-bold text-lg text-green-800">Rp {{ number_format($total, 0, ',', '.') }},-</span>
                    </div>
                </div>
            </div>
            @endif

            {{-- Bagian: Perlengkapan (Ketentuan Khusus) --}}
            @if(isset($ppdbInfos['ketentuan_khusus']))
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-2xl font-bold mb-4 text-green-700">Perlengkapan Yang Perlu Dibawa</h3>
                <ul class="list-decimal list-inside space-y-4 text-gray-700">
                    @foreach($ppdbInfos['ketentuan_khusus'] as $info)
                    <li>
                        <strong>{{ $info->judul }}</strong>
                        @if($info->deskripsi)
                        <ul class="list-disc list-inside ml-6 mt-1 text-sm text-gray-600 space-y-1">
                            {{-- Ubah string deskripsi menjadi array untuk diloop --}}
                            @foreach(explode(';', $info->deskripsi) as $item)
                                <li>{{ trim($item) }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                <p class="mt-6 bg-yellow-100 text-yellow-800 p-3 rounded-lg text-sm">
                    <strong>NB:</strong> Semua Barang Santri Wajib Diberi Nama Permanen untuk menghindari kehilangan atau tertukar.
                </p>
            </div>
            @endif
            
        </div>
    </div>
</div>
@endsection