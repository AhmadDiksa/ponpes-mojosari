<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalKegiatan extends Model
{
    protected $fillable = ['waktu', 'kegiatan', 'tipe', 'urutan'];
}
