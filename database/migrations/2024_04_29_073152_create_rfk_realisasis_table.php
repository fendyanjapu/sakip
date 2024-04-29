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
        Schema::create('rfk_realisasis', function (Blueprint $table) {
            $table->id();

            $table->string('bulan');
            $table->char('triwulan', length:1);
            $table->string('jumlah_output');
            $table->string('pagu');
            $table->char('tahun', length:4);

            $table->foreignId('rfk_program_id');
            $table->foreignId('rfk_kegiatan_id');
            $table->foreignId('rfk_subkegiatan_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfk_realisasis');
    }
};
