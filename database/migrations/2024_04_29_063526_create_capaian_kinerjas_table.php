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
        Schema::create('capaian_kinerjas', function (Blueprint $table) {
            $table->id();

            $table->string('iku');
            $table->string('triwulan_i_target')->nullable();
            $table->string('triwulan_i_realisasi')->nullable();
            $table->string('triwulan_ii_target')->nullable();
            $table->string('triwulan_ii_realisasi')->nullable();
            $table->string('triwulan_iii_target')->nullable();
            $table->string('triwulan_iii_realisasi')->nullable();
            $table->string('triwulan_iv_target')->nullable();
            $table->string('triwulan_iv_realisasi')->nullable();
            $table->string('t_jan')->nullable();
            $table->string('t_feb')->nullable();
            $table->string('t_mar')->nullable();
            $table->string('t_apr')->nullable();
            $table->string('t_mei')->nullable();
            $table->string('t_jun')->nullable();
            $table->string('t_jul')->nullable();
            $table->string('t_ags')->nullable();
            $table->string('t_sep')->nullable();
            $table->string('t_okt')->nullable();
            $table->string('t_nov')->nullable();
            $table->string('t_des')->nullable();
            $table->string('r_jan')->nullable();
            $table->string('r_feb')->nullable();
            $table->string('r_mar')->nullable();
            $table->string('r_apr')->nullable();
            $table->string('r_mei')->nullable();
            $table->string('r_jun')->nullable();
            $table->string('r_jul')->nullable();
            $table->string('r_ags')->nullable();
            $table->string('r_sep')->nullable();
            $table->string('r_okt')->nullable();
            $table->string('r_nov')->nullable();
            $table->string('r_des')->nullable();
            $table->string('penyebab_keberhasilan')->nullable();
            $table->string('hambatan_dan_kendala')->nullable();
            $table->string('upaya_perbaikan_yg_telah_dilakukan')->nullable();
            $table->string('rekomendasi')->nullable();
            $table->string('target')->nullable();

            $table->char('tahun', length: 4);

            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capaian_kinerjas');
    }
};
