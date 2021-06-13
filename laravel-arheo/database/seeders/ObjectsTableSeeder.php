<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objects')->insert([
            [
                'name' => 'Жертвоприношення кельта  - 1',
                'code' => 'ДУ.94.X.2.1',
                'finds_quantity' => 0,
                'date_of_detection' => Carbon::parse('2020-04-27'),
                'post_id' => 2,
                'culture_id' => 5,
                'topography_id' => 3,
                'involved_person' => null,
                'lat' => 50.357379,
                'lng' => 25.843668,
                'description' => '<p>Можливе місце жертвоприношення у формі сокири "кельта" лужицької культури( 1300 - 500 р. до н.е). Обєкт представляє собою лінзовидне включення чорного підзолистого грунту приблизно 50 см в діаметрі і товщиною до 40 см. Сокира находилась в товщі лінзи і була відділена від жовтого опідзоленого грунту 3 - 4 см чорного підзолистого грунту. Супровідний матеріал не виявленно.<br></p>',
                'photos' => '{16235291275.jpg,162352912786.jpg,162352912741.jpg}',
                'authors' => '{0,1}',
            ],
        ]);
    }
}
