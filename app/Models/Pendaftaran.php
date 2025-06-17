<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pendaftaran', 'tahun_pendaftaran', 'nama_santri', 'tempat_lahir',
        'tgl_lahir', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah',
        'pekerjaan_ibu', 'nomor_telepon', 'alamat_rumah', 'status',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];
}