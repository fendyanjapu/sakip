<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RfkKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfk_program_id',
        'kegiatan_kode',
        'kegiatan_sasaran',
        'kegiatan',
        'kegiatan_indikator_kinerja',
        'kegiatan_satuan',
        'kegiatan_target_renstra_k',
        'kegiatan_realisasi_pencapaian_k',
        'kegiatan_target_kinerja_k',
        'kegiatan_ket',
        'user_id',
        'tahun',
    ];

    public function rfkProgram(): BelongsTo
    {
        return $this->belongsTo(RfkProgram::class);
    }

    public function rfkSubkegiatan(): HasMany
    {
        return $this->hasMany(RfkSubkegiatan::class);
    }
}
