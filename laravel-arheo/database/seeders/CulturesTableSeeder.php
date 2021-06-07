<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CulturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cultures')->insert([
            [
                'name' => 'Пізній палеоліт',
                'color' => '08E5F3'
            ],
            [
                'name' => 'Фінальний палеоліт',
                'color' => '08ADF3'
            ],
            [
                'name' => 'Мезоліт',
                'color' => '007CC1'
            ],
            [
                'name' => 'Неоліт',
                'color' => '0500FF'
            ],
            [
                'name' => 'Енеоліт',
                'color' => 'D8C100'
            ],
            [
                'name' => 'Епоха бронзи',
                'color' => 'F0A30A'
            ],
            [
                'name' => 'Ранньозалізний вік',
                'color' => 'FA6800'
            ],
            [
                'name' => 'Латенський час',
                'color' => 'FF0202'
            ],
            [
                'name' => 'Римський час',
                'color' => 'EB33EB'
            ],
            [
                'name' => 'Ранні словʼяни',
                'color' => 'A4C400'
            ],
            [
                'name' => 'Словʼяни Х ст.',
                'color' => '60A917'
            ],
            [
                'name' => 'Давньоруський час ХІ – ХІІІ ст.',
                'color' => '008A00'
            ],
            [
                'name' => 'Литовсько-польська доба',
                'color' => '094500'
            ],
        ]);

    }
}
