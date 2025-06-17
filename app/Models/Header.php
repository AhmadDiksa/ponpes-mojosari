<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
        'logo', 'title', 'menus'
    ];
    protected $casts = [
        'menus' => 'array',
    ];
}
