<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klub')->insert([
            [
                'nama_klub' => 'Persib',
                'kota_klub' => 'Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_klub' => 'Arema',
                'kota_klub' => 'Malang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_klub' => 'Persija',
                'kota_klub' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
