<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [];

        $regions[] = [
            'name' => 'Рівненська'
        ];

        DB::table('regions')->insert($regions);
    }
}
