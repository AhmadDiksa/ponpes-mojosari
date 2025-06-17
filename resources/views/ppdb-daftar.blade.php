@extends('layouts.app')

@section('title', 'Formulir Pendaftaran Online')

@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto px-4 sm:px-6 py-12 md:py-16">
        
        <div class="text-center mb-10" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Formulir Pendaftaran Santri Baru</h2>
            <p class="text-gray-600 mt-2 max-w-2xl mx-auto">
                Mohon isi semua data dengan benar sesuai dengan dokumen resmi (Akte Kelahiran dan Kartu Keluarga).
            </p>
        </div>

        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-2xl" data-aos="fade-up" data-aos-delay="200">
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded-lg" role="alert">
                    <p class="font-bold">Pendaftaran Berhasil!</p>
                    <p>{!! session('success') !!}</p>
                </div>
            @endif

            <form action="{{ route('ppdb.store') }}" method="POST">
                @csrf
                <div class="space-y-8">
                    {{-- Data Diri Santri --}}
                    <div>
                        <h3 class="text-xl font-semibold border-b pb-3 text-green-800 mb-6">A. Data Calon Santri</h3>
                        <div class="space-y-6">
                            <div>
                                <label for="nama_santri" class="block text-sm font-medium text-gray-700">Nama Lengkap Santri</label>
                                <input type="text" name="nama_santri" id="nama_santri" value="{{ old('nama_santri') }}" required class="mt-1 block w-full rounded-lg border-2 border-green-800 bg-white shadow-sm focus:border-green-500 focus:ring-1 focus:ring-green-500 sm:text-sm">
                                @error('nama_santri')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required class="mt-1 block w-full rounded-lg border-2 border-green-800 bg-white shadow-sm focus:border-green-500 focus:ring-1 focus:ring-green-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}" required class="mt-1 block w-full rounded-lg border-2 border-green-800 bg-white shadow-sm focus:border-green-500 focus:ring-1 focus:ring-green-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="alamat_rumah" class="block text-sm font-medium text-gray-700">Alamat Rumah (Sesuai KK)</label>
                                <textarea name="alamat_rumah" id="alamat_rumah" rows="3" required class="mt-1 block w-full rounded-lg border-2 border-green-800 bg-white shadow-sm focus:border-green-500 focus:ring-1 focus:ring-green-500 sm:text-sm">{{ old('alamat_rumah') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Data Orang Tua --}}
                    <div>
                        <h3 class="text-xl font-semibold border-b pb-3 text-gray-800 mb-6">B. Data Orang Tua / Wali</h3>
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nama_ayah" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                                    <input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}" required class="mt-1 block w-full rounded-lg border-2 border-green-800 bg-white shadow-sm focus:border-green-500 focus:ring-1 focus:ring-green-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700">Pekerjaan Ayah</label>
                                    <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required class="mt-1 block w-full rounded-lg border-2 border-green-800 bg-white shadow-sm focus:border-green-500 focus:ring-1 focus:ring-green-500 sm:text-sm">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                                    <input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}" required class="mt-1 block w-full rounded-lg border-2 border-green-800 bg-white shadow-sm focus:border-green-500 focus:ring-1 focus:ring-green-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700">Pekerjaan Ibu</label>
                                    <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required class="mt-1 block w-full rounded-lg border-2 border-green-800 bg-white shadow-sm focus:border-green-500 focus:ring-1 focus:ring-green-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon / WhatsApp (Aktif)</label>
                                <input type="tel" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}" required class="mt-1 block w-full rounded-lg border-2 border-green-800 bg-white shadow-sm focus:border-green-500 focus:ring-1 focus:ring-green-500 sm:text-sm placeholder-gray-400" placeholder="Contoh: 081234567890">
                                @error('nomor_telepon')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="max-w-4xl mx-auto mt-12" data-aos="fade-up">
                        <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">Informasi Berkas Pendaftaran</h3>
                        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-6 rounded-r-lg">
                            <p class="font-semibold mb-2">Berkas-berkas berikut ini harap disiapkan dan dibawa saat melakukan daftar ulang di pondok:</p>
                            <ul class="list-disc list-inside space-y-2">
                                <li>Fotokopi Kartu Keluarga (KK): 1 Lembar</li>
                                <li>Fotokopi Akte Kelahiran: 1 Lembar</li>
                                <li>Pas Foto Santri Ukuran 3x4 (Background Merah): 3 Lembar</li>
                                <li>Pas Foto Mahram Ukuran 3x4: 2 Lembar</li>
                                <li>Bukti Pembayaran Administrasi (jika sudah membayar via transfer)</li>
                            </ul>
                        </div>
                    </div>
                    
                    {{-- Tombol Submit --}}
                    <div class="pt-5">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300">
                            Kirim Pendaftaran
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>
</div>
@endsection