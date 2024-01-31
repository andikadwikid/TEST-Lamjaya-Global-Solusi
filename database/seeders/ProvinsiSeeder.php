<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => 'P001',
                'nama' => 'Aceh',
                'active' => true
            ],
            [
                'kode' => 'P002',
                'nama' => 'DKI Jakarta',
                'active' => true
            ],
            [
                'kode' => 'P003',
                'nama' => 'Bali',
                'active' => false
            ],
        ];

        Provinsi::insert($data);
    }
}
