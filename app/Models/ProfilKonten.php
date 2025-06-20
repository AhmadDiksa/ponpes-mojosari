<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProfilKonten extends Model
{
    protected $fillable = ['kategori', 'konten', 'urutan'];
}