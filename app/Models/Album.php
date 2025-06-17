<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'cover_image'];

    // Sebuah album memiliki banyak foto
    public function photos(): HasMany
    {
        return $this->hasMany(Gallery::class, 'album_id');
    }
}