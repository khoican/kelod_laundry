<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisCuciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        'DB'::table('jenis__cucis')->insert(
            array(
                [
                    'jenis_cuci' => 'Cuci Kering - Express',
                    'harga' => 5000
                ]
            )
        );
    }
}
