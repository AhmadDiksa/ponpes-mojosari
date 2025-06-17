<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->integer('no_pendaftaran'); // Nomor pendaftaran per tahun
            $table->year('tahun_pendaftaran'); // Tahun pendaftaran
            
            // Data Santri
            $table->string('no_induk')->nullable(); // Diisi oleh admin nanti
            $table->string('nama_santri');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            
            // Data Orang Tua
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            
            // Kontak & Alamat
            $table->string('nomor_telepon');
            $table->text('alamat_rumah');
            
            // Data Pondok (Diisi admin nanti)
            $table->date('tanggal_masuk_pondok')->nullable();
            $table->string('kelas')->nullable();
            $table->string('kamar')->nullable();
            $table->text('keterangan')->nullable();

            $table->string('status')->default('pending'); // Status: pending, verified, rejected
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};