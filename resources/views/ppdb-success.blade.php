{{-- resources/views/ppdb-success.blade.php --}}
@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-6 py-20">
        <div class="max-w-3xl mx-auto bg-white p-8 md:p-12 rounded-xl shadow-2xl text-center" data-aos="zoom-in">
            
            {{-- Ikon Sukses --}}
            <div class="w-24 h-24 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>

            {{-- Judul Halaman --}}
            <h2 class="text-4xl font-bold text-gray-800 mt-6">Pendaftaran Berhasil!</h2>
            <p class="text-gray-600 mt-2">
                Terima kasih, formulir pendaftaran untuk ananda <strong class="text-gray-900">{{ $pendaftaran->nama_santri }}</strong> telah kami terima.
            </p>

            {{-- Nomor Pendaftaran --}}
            <div class="mt-8 bg-green-50 border-2 border-dashed border-green-300 p-6 rounded-lg">
                <p class="text-lg text-gray-700">Nomor Pendaftaran Anda adalah:</p>
                <p class="text-4xl font-extrabold text-green-700 tracking-wider mt-2">
                    {{ $pendaftaran->tahun_pendaftaran }}-{{ str_pad($pendaftaran->no_pendaftaran, 4, '0', STR_PAD_LEFT) }}
                </p>
                <p class="text-sm text-gray-500 mt-3">
                    <strong>Penting:</strong> Mohon simpan dan catat nomor pendaftaran ini untuk keperluan konfirmasi dan daftar ulang.
                </p>
            </div>
            
            {{-- Langkah Selanjutnya --}}
            <div class="mt-10 text-left">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Langkah Selanjutnya:</h3>
                <ul class="list-decimal list-inside space-y-3 text-gray-700">
                    <li>
                        <strong>Konfirmasi Pembayaran:</strong> Lakukan pembayaran biaya pendaftaran sesuai rincian di halaman informasi PPDB. Kirim bukti transfer ke nomor WhatsApp administrasi pondok dengan menyertakan Nama Lengkap Santri dan Nomor Pendaftaran.
                    </li>
                    <li>
                        <strong>Siapkan Berkas Fisik:</strong> Siapkan semua berkas yang dibutuhkan (Fotokopi KK, Akte, Pas Foto) untuk diserahkan saat daftar ulang di pondok.
                    </li>
                    <li>
                        <strong>Tunggu Informasi Lanjutan:</strong> Pantau informasi lebih lanjut dari kami melalui WhatsApp atau pengumuman di website.
                    </li>
                </ul>
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-12">
                <a href="{{ route('home') }}" class="inline-block bg-green-600 text-white font-bold px-8 py-3 rounded-lg shadow-lg hover:bg-green-700 transition-all duration-300">
                    Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </div>
</div>
@endsection