<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSopd extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
