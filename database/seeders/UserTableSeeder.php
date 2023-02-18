<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        'DB'::table('users')->insert(array(
        [
            'username' => 'manajer@kelod',
            'password' => bcrypt('manajer123'),
            'user_status' => 'Manajer'
        ],
        [
            'username' => 'kasir@kelod',
            'password' => bcrypt('kasir123'),
            'user_status' => 'Kasir'
        ],
        [
            'username' => 'cuci@kelod',
            'password' => bcrypt('cuci123'),
            'user_status' => 'Pencucian'
        ]));
    }
}
