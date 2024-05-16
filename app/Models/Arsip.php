<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_dokumen',
        'dokumen',
        'jenis_dokumen',
    ];
}
