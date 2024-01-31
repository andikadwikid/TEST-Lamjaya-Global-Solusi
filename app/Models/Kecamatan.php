<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $guard = [];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'kelurahans');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawais');
    }
}
