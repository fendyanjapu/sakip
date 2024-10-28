<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RfkRealisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan',
        'triwulan',
        'jumlah_output',
        'pagu',
        'rfk_program_id',
        'rfk_kegiatan_id',
        'rfk_subkegiatan_id',
        'user_id',
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

    public function rfkSubkegiatan(): BelongsTo
    {
        return $this->belongsTo(RfkSubkegiatan::class);
    }
}
