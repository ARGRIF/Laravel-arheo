<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'name' => 'Здовбиця - 1',
                'code' => 'ДУ.94.X.1.X',
                'finds_quantity' => 1,
                'date_of_detection' => Carbon::parse('2020-02-28'),
                'village_id' => 210,
                'involved_person' => null,
                'location_area' => 'cxjrHkgt|C`ApFfBxD|@JL}AMuCkBqEiBsG[KGz@',
                'location_square' => 1.71,
                'description' => '<p><b>Здовбиця - 1</b></p>',
                'photos' => '{162351543013.jpg}',
                'authors' => '{0}',
                'topographies' => '{1,2}',
                'cultures' => '{9,10}',
            ],
             [
                 'name' => 'Здовбиця - 2',
                'code' => 'ДУ.94.X.2.X',
                'finds_quantity' => 1,
                'date_of_detection' => Carbon::parse('2021-04-18'),
                'village_id' => 210,
                'involved_person' => 'Рябченко Микола',
                'location_area' => 'iqjrHqtv|CLz@d@x@Vn@h@Lx@iAR}BGcBMEMJSf@[^Ul@c@F_@W',
                'location_square' => 0.65,
                'description' => '<p><b>Здовбиця - 2</b></p>',
                'photos' => '{16235176539.jpg,162351765383.jpg,16235176541.jpg}',
                'authors' => '{0,1}',
                'topographies' => '{3}',
                'cultures' => '{5}',
            ],
            [
                'name' => 'Здовбиця - 3',
                'code' => 'ДУ.94.X.3.X',
                'finds_quantity' => 1,
                'date_of_detection' => Carbon::parse('2020-10-11'),
                'village_id' => 210,
                'involved_person' => 'Бєлаш Олег',
                'location_area' => '{hmrHyht|CsAX}@rAQlAd@\|@E`Ab@vA`ETbBb@hAh@a@EwAm@gGs@eD',
                'location_square' => 1.69,
                'description' => '<p><b>Здовбиця - 3</b></p>',
                'photos' => '{162351900345.jpg,162351900383.jpg,162351900372.jpg}',
                'authors' => '{0,1}',
                'topographies' => '{1,2}',
                'cultures' => '{5,9}',
            ],


        ]);
    }
}
