<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pendaftaran', 'tahun_pendaftaran', 'nama_santri', 'tempat_lahir',
        'tgl_lahir', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah',
        'pekerjaan_ibu', 'nomor_telepon', 'alamat_rumah', 'status',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pendaftaran) {
            // Generate nomor pendaftaran otomatis jika belum diisi
            if (empty($pendaftaran->no_pendaftaran)) {
                $pendaftaran->no_pendaftaran = self::generateNomorPendaftaran();
            }
            
            // Set tahun pendaftaran otomatis jika belum diisi
            if (empty($pendaftaran->tahun_pendaftaran)) {
                $pendaftaran->tahun_pendaftaran = date('Y');
            }
        });
    }

    /**
     * Generate nomor pendaftaran otomatis
     */
    public static function generateNomorPendaftaran()
    {
        $tahun = date('Y');
        
        // Ambil nomor pendaftaran terakhir untuk tahun ini
        $lastPendaftaran = self::where('tahun_pendaftaran', $tahun)
            ->orderBy('no_pendaftaran', 'desc')
            ->first();

        if ($lastPendaftaran) {
            return $lastPendaftaran->no_pendaftaran + 1;
        }

        // Jika belum ada pendaftaran untuk tahun ini, mulai dari 1
        return 1;
    }

    /**
     * Get formatted nomor pendaftaran
     */
    public function getFormattedNomorPendaftaranAttribute()
    {
        return $this->tahun_pendaftaran . '-' . str_pad($this->no_pendaftaran, 4, '0', STR_PAD_LEFT);
    }
}