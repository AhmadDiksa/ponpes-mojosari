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
        Schema::table('footers', function (Blueprint $table) {
            $table->string('wa_label')->nullable();
            $table->string('wa_url')->nullable();
            $table->string('fb_label')->nullable();
            $table->string('fb_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->dropColumn(['wa_label', 'wa_url', 'fb_label', 'fb_url']);
        });
    }
};
