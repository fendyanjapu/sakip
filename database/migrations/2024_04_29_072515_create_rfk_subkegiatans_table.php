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
        Schema::create('rfk_subkegiatans', function (Blueprint $table) {
            $table->id();

            $table->string('subkegiatan_kode');
            $table->string('subkegiatan_sasatan');
            $table->string('subkegiatan');
            $table->string('subkegiatan_indikator_kinerja');
            $table->string('subkegiatan_satuan_k');
            $table->string('subkegiatan_target_renstra_k');
            $table->string('subkegiatan_target_renstra_rp');
            $table->string('subkegiatan_realisasi_pencapaian_k');
            $table->string('subkegiatan_realisasi_pencapaian_rp');
            $table->string('subkegiatan_target_kinerja_k');
            $table->string('subkegiatan_target_kinerja_rp');
            $table->string('subkegiatan_ket');
            $table->string('uraian_singkat');
            $table->char('tahun', length:4);

            $table->foreignId('rfk_program_id');
            $table->foreignId('rfk_kegiatan_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfk_subkegiatans');
    }
};
