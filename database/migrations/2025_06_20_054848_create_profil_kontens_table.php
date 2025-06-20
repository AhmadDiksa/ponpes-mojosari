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
        Schema::create('profil_kontens', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['visi', 'misi', 'sejarah', 'larangan']);
            $table->text('konten'); // Untuk menyimpan satu poin visi/misi atau satu paragraf sejarah
            $table->integer('urutan')->default(0); // Untuk mengatur urutan tampilan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_kontens');
    }
};
