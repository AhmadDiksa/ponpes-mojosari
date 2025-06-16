<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramPendidikan extends Model
{
    //
    protected $fillable = ['kategori', 'nama','deskripsi', 'image'];

    /**
     * Get the route key for Laravel route model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return request()->is('admin/*') ? 'id' : 'slug';
    }
}
