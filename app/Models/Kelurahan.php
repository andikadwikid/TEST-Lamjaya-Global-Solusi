<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $guard = [];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatans');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawais');
    }
}
