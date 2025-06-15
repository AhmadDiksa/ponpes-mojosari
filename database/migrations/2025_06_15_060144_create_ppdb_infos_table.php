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
        Schema::create('ppdb_infos', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // 'ketentuan_umum', 'ketentuan_khusus', 'biaya', 'syarat_pendaftaran'
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('nilai')->nullable(); // Untuk harga atau detail singkat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_infos');
    }
};
