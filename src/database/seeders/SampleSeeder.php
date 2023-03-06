<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fakerのインスタンス化
        $faker = FakerFactory::create();

        // 指定した幅の間でランダムに時間を生成
        $random_time = $faker->dateTimeBetween('15:00:00', '23:00:00')->format('H:i:s');

        // 指定した幅の間でランダムに時間を加算
        $start_date = $faker->dateTimeThisMonth;
        $start_date_carbon = Carbon::parse($start_date);
        $end_date_carbon = $start_date_carbon->copy()->addDays($faker->numberBetween(1, 10));
        dd([
            '開始日' => $start_date_carbon->format('Y-m-d'),
            '終了日' => $end_date_carbon->format('Y-m-d')]
        );
    }
}
