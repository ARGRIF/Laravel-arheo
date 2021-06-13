<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([


            [
                'name' => 'Знаряддя',
                'material_id' => '1',
            ],
            [
                'name' => 'Заготовки',
                'material_id' => '1',
            ],
            [
                'name' => 'Нуклеуси',
                'material_id' => '1',
            ],
            [
                'name' => 'Відщепи',
                'material_id' => '1',
            ],
            [
                'name' => 'Луски',
                'material_id' => '1',
            ],






            [
                'name' => 'Стінки',
                'material_id' => '2',
            ],
            [
                'name' => 'Вінця',
                'material_id' => '2',
            ],
            [
                'name' => 'Денця',
                'material_id' => '2',
            ],
            [
                'name' => 'Ручки',
                'material_id' => '2',
            ],





            [
                'name' => 'Стінки',
                'material_id' => '3',
            ],
            [
                'name' => 'Вінця',
                'material_id' => '3',
            ],
            [
                'name' => 'Денця',
                'material_id' => '3',
            ],
            [
                'name' => 'Ручки',
                'material_id' => '3',
            ],


            [
                'name' => 'Знаряддя праці',
                'material_id' => '4',
            ],
            [
                'name' => 'Заготовки / криця',
                'material_id' => '4',
            ],
            [
                'name' => 'Побутові вироби',
                'material_id' => '4',
            ],
            [
                'name' => 'Зброя',
                'material_id' => '4',
            ],





            [
                'name' => 'Прикраси',
                'material_id' => '5',
            ],
            [
                'name' => 'Зброя',
                'material_id' => '5',
            ],
            [
                'name' => 'Побутові вироби',
                'material_id' => '5',
            ],
            [
                'name' => 'Монети',
                'material_id' => '5',
            ],
            [
                'name' => 'Оплавки',
                'material_id' => '5',
            ],
            [
                'name' => 'Заготовки / злитки',
                'material_id' => '5',
            ],



            [
                'name' => 'Прикраси',
                'material_id' => '6',
            ],
            [
                'name' => 'Ємності',
                'material_id' => '6',
            ],





            [
                'name' => 'Людські рештки',
                'material_id' => '7',
            ],
            [
                'name' => 'Тваринні рештки',
                'material_id' => '7',
            ],






        ]);
    }
}
