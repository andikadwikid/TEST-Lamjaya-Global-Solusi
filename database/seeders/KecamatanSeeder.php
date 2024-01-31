<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => 'K001',
                'nama' => 'Cakung Timur',
                'active' => true
            ],
            [
                'kode' => 'K002',
                'nama' => 'Cakung Barat',
                'active' => true
            ],
            [
                'kode' => 'K003',
                'nama' => 'Pasir Panjang',
                'active' => true
            ],
        ];

        Kecamatan::insert($data);
    }
}
