<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RfkSubkegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'subkegiatan_kode',
        'subkegiatan_sasaran',
        'subkegiatan',
        'subkegiatan_indikator_kinerja',
        'subkegiatan_satuan_k',
        'subkegiatan_target_renstra_k',
        'subkegiatan_target_renstra_rp',
        'subkegiatan_realisasi_pencapaian_k',
        'subkegiatan_realisasi_pencapaian_rp',
        'subkegiatan_target_kinerja_k',
        'subkegiatan_target_kinerja_rp',
        'subkegiatan_ket',
        'uraian_singkat',
        'user_id',
        'rfk_program_id',
        'rfk_kegiatan_id',
        'tahun',
    ];

    public function rfkProgram(): BelongsTo
    {
        return $this->belongsTo(RfkProgram::class);
    }

    public function rfkKegiatan(): BelongsTo
    {
        return $this->belongsTo(RfkKegiatan::class);
    }
}
