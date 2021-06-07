<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopographiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topographies')->insert([
            [
                'name' => 'Орне поле',
            ],
            [
                'name' => 'Дерноване поле',
            ],
            [
                'name' => 'Ліс',
            ],
            [
                'name' => 'Карʼєр',
            ],

        ]);
    }
}
