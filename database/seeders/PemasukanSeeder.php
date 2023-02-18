<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        'DB'::table('pemasukans')->insert(
            array(
                [
                    'nama_pelanggan' => 'Admin',
                    'total_harga' => 0,
                    'status' => false
                ]
            )
        );
    }
}
