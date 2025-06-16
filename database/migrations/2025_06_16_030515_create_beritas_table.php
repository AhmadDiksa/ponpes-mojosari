<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Untuk URL yang SEO-friendly
            $table->longText('content'); // Konten artikel (bisa sangat panjang)
            $table->string('thumbnail')->nullable(); // Path ke gambar thumbnail
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke penulis (admin)
            $table->timestamp('published_at')->nullable(); // Tanggal artikel dipublikasikan
            $table->string('status')->default('draft'); // Status: draft atau published
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};