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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('nama_sopd');
            $table->string('username');
            $table->string('password');
            $table->char('level', length: 1);
            $table->char('jenis_sopd', length: 1);
            $table->string('kepala_dinas')->nullable();
            $table->string('nip_kepala_dinas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
