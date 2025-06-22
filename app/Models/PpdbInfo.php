<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpdbInfo extends Model
{
    protected $fillable = [
        'kategori',
        'judul',
        'deskripsi',
        'nilai',
    ];
}
