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
        Schema::create('rfks', function (Blueprint $table) {
            $table->id();

            $table->string('bulan');
            $table->string('target_fisik');
            $table->string('target_keuangan');
            $table->string('realisasi_keuangan');
            $table->string('realisasi_fisik');
            $table->string('prosentasi_fisik');
            $table->string('prosentasi_keuangan');
            $table->string('file_dukung');
            $table->string('nama_file');
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
        Schema::dropIfExists('rfks');
    }
};
