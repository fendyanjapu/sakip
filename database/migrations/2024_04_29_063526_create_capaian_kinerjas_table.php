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
            $table->string('target');
            $table->string('triwulan_i');
            $table->string('triwulan_ii');
            $table->string('triwulan_iii');
            $table->string('triwulan_iv');
            $table->string('t_jan');
            $table->string('t_feb');
            $table->string('t_mar');
            $table->string('t_apr');
            $table->string('t_mei');
            $table->string('t_jun');
            $table->string('t_jul');
            $table->string('t_ags');
            $table->string('t_sep');
            $table->string('t_okt');
            $table->string('t_nov');
            $table->string('t_des');
            $table->string('r_jan');
            $table->string('r_feb');
            $table->string('r_mar');
            $table->string('r_apr');
            $table->string('r_mei');
            $table->string('r_jun');
            $table->string('r_jul');
            $table->string('r_ags');
            $table->string('r_sep');
            $table->string('r_okt');
            $table->string('r_nov');
            $table->string('r_des');
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
