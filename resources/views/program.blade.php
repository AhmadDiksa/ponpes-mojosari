@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="container mx-auto px-6 py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-800">Program & Pendidikan</h2>
            <p class="text-gray-500 mt-2">Ragam pilihan program untuk membentuk santri yang unggul.</p>
        </div>

        <div class="space-y-16">
            {{-- Program Unggulan Pesantren --}}
            <div data-aos="fade-up">
                <h3 class="text-3xl font-bold mb-8 text-green-700">Program Unggulan Pesantren</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($programPesantren as $program)
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <h4 class="text-xl font-semibold text-gray-800">{{ $program->nama }}</h4>
                        @if($program->deskripsi)
                            <p class="text-gray-600 mt-2">{{ $program->deskripsi }}</p>
                        @endif
                    </div>
                    @empty
                    <p class="text-gray-500 col-span-full">Program unggulan belum tersedia.</p>
                    @endforelse
                </div>
            </div>

            {{-- Pendidikan Formal --}}
            <div data-aos="fade-up">
                <h3 class="text-3xl font-bold mb-8 text-green-700">Pendidikan Formal</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                     @forelse($pendidikanFormal as $pendidikan)
                     <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <h4 class="text-xl font-semibold text-gray-800">{{ $pendidikan->nama }}</h4>
                        @if($pendidikan->deskripsi)
                            <p class="text-gray-600 mt-2">{{ $pendidikan->deskripsi }}</p>
                        @endif
                    </div>
                    @empty
                    <p class="text-gray-500 col-span-full">Data pendidikan formal belum tersedia.</p>
                    @endforelse
                </div>
            </div>

             {{-- Ekstrakurikuler --}}
            <div data-aos="fade-up">
                <h3 class="text-3xl font-bold mb-8 text-green-700">Ekstrakurikuler</h3>
                <div class="flex flex-wrap gap-4">
                     @forelse($ekstrakulikuler as $ekstra)
                     <span class="bg-green-100 text-green-800 text-sm font-medium px-4 py-2 rounded-full" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">{{ $ekstra->nama }}</span>
                    @empty
                    <p class="text-gray-500">Data ekstrakurikuler belum tersedia.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>
@endsection