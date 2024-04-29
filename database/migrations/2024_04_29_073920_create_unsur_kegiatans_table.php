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
        Schema::create('unsur_kegiatans', function (Blueprint $table) {
            $table->id();

            $table->string('unsur_kegiatan');
            $table->string('unsur_kegiatan_kode');
            $table->string('bidang');
            $table->string('bidang_kode');
            $table->char('tahun', length:4);

            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unsur_kegiatans');
    }
};
