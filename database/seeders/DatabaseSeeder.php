<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarif')->insert([
            'jenis_kendaraan' => 'motor',
            'tarif' => '3000',
        ]);
    
        DB::table('tarif')->insert([
            'jenis_kendaraan' => 'mobil',
            'tarif' => '5000',
        ]);
    
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => '$2y$10$WtyBW2kHTjpPZLXqS0vqhub8IwAZAK5iBUT0jnsTuNT/yq6welDCy', //123
            'nama' => 'Muhammad Admin',
            'nohp' => '01234567890',
            'level' => 1
        ]);
    }
}
