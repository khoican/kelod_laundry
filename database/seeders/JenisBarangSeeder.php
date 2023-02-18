<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        'DB'::table('jenis__barangs')->insert(array([
            'jenis_barang' => 'Baju/Celana',
            'harga' => '3000'
        ]));
    }
}
