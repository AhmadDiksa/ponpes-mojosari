<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $fillable = ['album_id', 'image_path', 'title', 'description'];

    // Sebuah foto dimiliki oleh satu album
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}