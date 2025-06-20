<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'section_name',
        'content'
    ];

    protected $casts = [
        'content' => 'array',
    ];

    // Mutator untuk memastikan content selalu dalam format yang benar
    public function setContentAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['content'] = json_encode($value);
        } else {
            $this->attributes['content'] = $value;
        }
    }

    // Accessor untuk memastikan content selalu dalam format yang benar
    public function getContentAttribute($value)
    {
        if (empty($value)) {
            return [];
        }
        
        $decoded = json_decode($value, true);
        return json_last_error() === JSON_ERROR_NONE ? $decoded : [$value];
    }
}
