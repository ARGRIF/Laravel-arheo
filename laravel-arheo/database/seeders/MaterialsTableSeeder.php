<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([

            [
                'name' => 'Кремінь'
            ],
            [
                'name' => 'Кераміка гончарна'
            ],
            [
                'name' => 'Кераміка ліпна'
            ],
            [
                'name' => 'Метал чорний'
            ],
            [
                'name' => 'Метал кольоровий'
            ],
            [
                'name' => 'Скло'
            ],
            [
                'name' => 'Кістка'
            ],

        ]);
    }
}
