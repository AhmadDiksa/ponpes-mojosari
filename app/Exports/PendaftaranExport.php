<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftaranExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Ambil seluruh kolom
        return Pendaftaran::select([
            'id',
            'no_pendaftaran',
            'tahun_pendaftaran',
            'no_induk',
            'nama_santri',
            'tempat_lahir',
            'tgl_lahir',
            'nama_ayah',
            'nama_ibu',
            'pekerjaan_ayah',
            'pekerjaan_ibu',
            'nomor_telepon',
            'alamat_rumah',
            'tanggal_masuk_pondok',
            'kelas',
            'kamar',
            'keterangan',
            'status',
            'created_at',
            'updated_at',
        ])->get()->map(function ($pendaftaran) {
            // Tambahkan kolom nomor pendaftaran yang sudah diformat
            $pendaftaran->formatted_no_pendaftaran = $pendaftaran->formatted_nomor_pendaftaran;
            return $pendaftaran;
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'No Pendaftaran',
            'Tahun Pendaftaran',
            'No Induk',
            'Nama Santri',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Nama Ayah',
            'Nama Ibu',
            'Pekerjaan Ayah',
            'Pekerjaan Ibu',
            'Nomor Telepon',
            'Alamat Rumah',
            'Tanggal Masuk Pondok',
            'Kelas',
            'Kamar',
            'Keterangan',
            'Status',
            'Created At',
            'Updated At',
            'Nomor Pendaftaran (Formatted)',
        ];
    }
} 