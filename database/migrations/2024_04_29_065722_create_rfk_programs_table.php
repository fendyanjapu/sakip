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
        Schema::create('rfk_programs', function (Blueprint $table) {
            $table->id();

            $table->string('kode_a');
            $table->string('kode_b');
            $table->string('program_kode');
            $table->string('sasaran');
            $table->string('program');
            $table->string('indikator_kinerja');
            $table->string('program_satuan');
            $table->string('target_renstra_k');
            $table->string('realisasi_pencapaian_k');
            $table->string('target_kinerja_k');
            $table->string('program_ket');
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
        Schema::dropIfExists('rfk_programs');
    }
};
