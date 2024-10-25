<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RfkProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_a',
        'kode_b',
        'program_kode',
        'sasaran',
        'program',
        'indikator_kinerja',
        'program_satuan',
        'target_renstra_k',
        'realisasi_pencapaian_k',
        'target_kinerja_k',
        'program_ket',
        'user_id',
        'tahun',
    ];

    public function rfkKegiatan(): HasMany
    {
        return $this->hasMany(RfkKegiatan::class);
    }
}
