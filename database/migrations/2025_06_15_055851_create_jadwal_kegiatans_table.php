<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('waktu'); // e.g., '03.00', '07.00 - 12.30'
            $table->string('kegiatan');
            $table->string('tipe')->default('harian'); // 'harian' atau 'tambahan'
            $table->integer('urutan')->default(0); // Untuk sorting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kegiatans');
    }
};
