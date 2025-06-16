<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'user_id',
        'published_at',
        'status',
    ];

    // Mengubah tipe data 'published_at' menjadi objek Carbon (tanggal)
    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Relasi ke penulis (author)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}