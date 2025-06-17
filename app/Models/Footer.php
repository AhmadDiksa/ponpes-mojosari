<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'address', 'phone', 'socials', 'copyright',
        'wa_label', 'wa_url', 'fb_label', 'fb_url'
    ];

    protected $casts = [
        'socials' => 'array',
    ];
}
