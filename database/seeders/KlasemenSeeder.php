<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klasemen')->insert([
            [
                'klub_id' => 1,
                'bertanding' => 0,
                'menang' => 0,
                'draw' => 0,
                'kalah' => 0,
                'jumlah_goal' => 0,
                'jumlah_kebobolan' => 0,
                'point' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'klub_id' => 2,
                'bertanding' => 0,
                'menang' => 0,
                'draw' => 0,
                'kalah' => 0,
                'jumlah_goal' => 0,
                'jumlah_kebobolan' => 0,
                'point' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'klub_id' => 3,
                'bertanding' => 0,
                'menang' => 0,
                'draw' => 0,
                'kalah' => 0,
                'jumlah_goal' => 0,
                'jumlah_kebobolan' => 0,
                'point' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
