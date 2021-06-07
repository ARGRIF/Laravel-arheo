<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('districts')->insert([
                [
                    'region_id' => '1',
                    'name' => 'Вараський',
                    'code' => 'ВА'
                ],
                [
                    'region_id' => '1',
                    'name' => 'Дубенський',
                    'code' => 'ДУ'
                ],
                [
                    'region_id' => '1',
                    'name' => 'Рівненський',
                    'code' => 'РІ'
                ],
                [
                    'region_id' => '1',
                    'name' => 'Сарненський',
                    'code' => 'СА'
                ],
            ]);



    }
}
