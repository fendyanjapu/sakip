<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapaianKinerja extends Model
{
    use HasFactory;

    protected $fillable = [
      'iku',
      'target',
      'triwulan_i_target',
      'triwulan_i_realisasi',
      'triwulan_ii_target',
      'triwulan_ii_realisasi',
      'triwulan_iii_target',
      'triwulan_iii_realisasi',
      'triwulan_iv_target',
      'triwulan_iv_realisasi',
      'penyebab_keberhasilan',
      'hambatan_dan_kendala',
      'upaya_perbaikan_yg_telah_dilakukan',
      'tahun',
      'user_id',
    ] ;
}
