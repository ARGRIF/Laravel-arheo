<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'avatar' => '162351199832.jpg',
                'name' => 'Максим Мельничук',
                'position_at_work' => 'Студент практикант',
                'specialization' => 'Поверхневі збори',
                'status' => true,
                'is_admin' => true,
                'email' => 'max.melnitschuk@gmail.com',
                'phone' => '+38965523221',
                'password' => Hash::make('12345678'),
            ],
            [
                'avatar' => '162351199854.jpg',
                'name' => 'Юрій Пшеничний',
                'position_at_work' => ' Заввіділом історії Державного історико-культурного заповідника м.Дубна. ',
                'specialization' => 'Історико культурний період панування слов’ян на територіях західної україни',
                'status' => true,
                'is_admin' => true,
                'email' => 'pshenychnyi.yurii@gmail.com',
                'phone' => '+38965547842',
                'password' => Hash::make('12345678'),
            ],
            [
                'avatar' => '162351199887.jpg',
                'name' => 'Віталій Ткач',
                'position_at_work' => 'Археолог',
                'specialization' => 'Рання доба бронзи на території Волині',
                'status' => true,
                'is_admin' => false,
                'email' => 'tkach.vitalii@gmail.com',
                'phone' => '+38968652493',
                'password' => Hash::make('12345678'),
            ],


        ]);
    }
}
