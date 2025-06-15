@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-6 py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Penerimaan Santri Baru</h2>
            <p class="text-gray-500 mt-2">Informasi lengkap seputar pendaftaran tahun ajaran 2025/2026.</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-12">
            
            {{-- Ketentuan Umum --}}
            @if(isset($ppdbInfos['ketentuan_umum']))
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-4 text-green-700">Ketentuan Umum</h3>
                <ul class="list-decimal list-inside space-y-2 text-gray-700">
                    @foreach($ppdbInfos['ketentuan_umum'] as $info)
                    <li>{{ $info->judul }}
                        @if($info->deskripsi)
                        <span class="text-sm text-gray-500 block ml-6">{{ $info->deskripsi }}</span>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Syarat Pendaftaran --}}
            @if(isset($ppdbInfos['syarat_pendaftaran']))
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-4 text-green-700">Syarat Pendaftaran</h3>
                <ul class="list-decimal list-inside space-y-2 text-gray-700">
                     @foreach($ppdbInfos['syarat_pendaftaran'] as $info)
                    <li>{{ $info->judul }}
                        @if($info->deskripsi)
                        <span class="text-sm text-gray-500 block ml-6">{{ $info->deskripsi }}</span>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            {{-- Rincian Biaya --}}
            @if(isset($ppdbInfos['biaya']))
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up">
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
                        <span class="font-bold text-lg text-green-800">TOTAL</span>
                        <span class="font-bold text-lg text-green-800">Rp {{ number_format($total, 0, ',', '.') }},-</span>
                    </div>
                </div>
            </div>
            @endif

            {{-- Ketentuan Khusus --}}
            @if(isset($ppdbInfos['ketentuan_khusus']))
            <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-4 text-green-700">Perlengkapan Yang Perlu Dibawa</h3>
                <ul class="list-decimal list-inside space-y-3 text-gray-700">
                    @foreach($ppdbInfos['ketentuan_khusus'] as $info)
                    <li>
                        <strong>{{ $info->judul }}</strong>
                        @if($info->deskripsi)
                        <ul class="list-disc list-inside ml-6 mt-1 text-sm text-gray-600">
                            {{-- Ubah string deskripsi menjadi array untuk diloop --}}
                            @foreach(explode(';', $info->deskripsi) as $item)
                                <li>{{ trim($item) }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                <p class="mt-6 bg-yellow-100 text-yellow-800 p-3 rounded-lg"><strong>NB:</strong> Semua Barang Santri Wajib Diberi Nama Permanen.</p>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection