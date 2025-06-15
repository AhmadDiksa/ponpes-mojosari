@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-6 py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Jadwal Kegiatan Santri</h2>
            <p class="text-gray-500 mt-2">Rutinitas harian dan kegiatan tambahan untuk pengembangan diri santri.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            {{-- Jadwal Harian --}}
            <div data-aos="fade-up">
                <h3 class="text-2xl font-semibold mb-6 text-green-700 text-center md:text-left">Kegiatan Harian</h3>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="p-4 text-left font-semibold">Waktu</th>
                                <th class="p-4 text-left font-semibold">Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwalHarian as $jadwal)
                            <tr class="border-b hover:bg-gray-100 transition-colors">
                                <td class="p-4 font-mono text-green-800">{{ $jadwal->waktu }}</td>
                                <td class="p-4 text-gray-700">{{ $jadwal->kegiatan }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="p-4 text-center text-gray-500">Jadwal harian belum tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Kegiatan Tambahan --}}
            <div data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-2xl font-semibold mb-6 text-green-700 text-center md:text-left">Kegiatan Tambahan</h3>
                <div class="space-y-4">
                    @forelse($jadwalTambahan as $jadwal)
                    <div class="bg-white p-4 rounded-lg shadow flex items-center space-x-4">
                        <div class="bg-green-100 text-green-800 p-2 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">{{ $jadwal->waktu }}</h4>
                            <p class="text-gray-600">{{ $jadwal->kegiatan }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white p-4 rounded-lg shadow text-center text-gray-500">
                        <p>Kegiatan tambahan belum tersedia.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection