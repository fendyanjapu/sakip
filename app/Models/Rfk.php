<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rfk extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan',
        'target_fisik',
        'target_keuangan',
        'realisasi_fisik',
        'realisasi_keuangan',
        'prosentase_fisik',
        'prosentase_keuangan',
        'file_dukung',
        'nama_file',
        'user_id',
        'tahun',
    ];
}
