<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $guard = [];

    public function kelurahan()
    {
        return $this->hasOne(Kelurahan::class, 'kelurahans');
    }

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class, 'kecamatans');
    }

    public function provinsi()
    {
        return $this->hasOne(Provinsi::class, 'provinsis');
    }
}
