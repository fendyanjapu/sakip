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
        Schema::create('rfk_kegiatans', function (Blueprint $table) {
            $table->id();

            $table->string('kegiatan_kode');
            $table->string('kegiatan_sasaran');
            $table->string('kegiatan');
            $table->string('kegiatan_indikator_kinerja');
            $table->string('kegiatan_satuan');
            $table->string('kegiatan_target_renstra_k');
            $table->string('kegiatan_realisasi_pencapaian_k');
            $table->string('kegiatan_target_kinerja_k');
            $table->string('kegiatan_ket');
            $table->char('tahun', length:4);

            $table->foreignId('rfk_program_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfk_kegiatans');
    }
};
