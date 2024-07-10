<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapaianKinerjaBulanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'iku',
        'satuan',
        'r_ags',
        'r_apr',
        'r_des',
        'r_feb',
        'r_jan',
        'r_jul',
        'r_jun',
        'r_mar',
        'r_mei',
        'r_nov',
        'r_okt',
        'r_sep',
        't_ags',
        't_apr',
        't_des',
        't_feb',
        't_jan',
        't_jul',
        't_jun',
        't_mar',
        't_mei',
        't_nov',
        't_okt',
        't_sep',
        'tahun',
        'user_id',
    ];
}
