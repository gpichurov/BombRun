<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statistics')
            ->insert([
                'user_id' => 1,
                'coins' => 413,
                'kills' => 224,
                'scrolls' => 214,
                'games' => 143,
                'best_score' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 2,
                'coins' => 4213,
                'kills' => 2324,
                'scrolls' => 2314,
                'games' => 2143,
                'best_score' => 1000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 3,
                'coins' => 1343,
                'kills' => 4253,
                'scrolls' => 2164,
                'games' => 2713,
                'best_score' => 1100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 4,
                'coins' => 1313,
                'kills' => 4223,
                'scrolls' => 2134,
                'games' => 2413,
                'best_score' => 1200,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 5,
                'coins' => 1353,
                'kills' => 4623,
                'scrolls' => 2714,
                'games' => 2813,
                'best_score' => 1300,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 6,
                'coins' => 1933,
                'kills' => 4273,
                'scrolls' => 2104,
                'games' => 2513,
                'best_score' => 1400,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 7,
                'coins' => 1133,
                'kills' => 2423,
                'scrolls' => 3214,
                'games' => 4213,
                'best_score' => 1500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 8,
                'coins' => 5133,
                'kills' => 6423,
                'scrolls' => 6214,
                'games' => 7213,
                'best_score' => 1600,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 9,
                'coins' => 8133,
                'kills' => 9423,
                'scrolls' => 1214,
                'games' => 2213,
                'best_score' => 1700,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 10,
                'coins' => 3133,
                'kills' => 4423,
                'scrolls' => 2144,
                'games' => 2153,
                'best_score' => 1800,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 11,
                'coins' => 1335,
                'kills' => 4236,
                'scrolls' => 2147,
                'games' => 2138,
                'best_score' => 1900,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('statistics')
            ->insert([
                'user_id' => 12,
                'coins' => 1331,
                'kills' => 4232,
                'scrolls' => 2143,
                'games' => 2138,
                'best_score' => 2000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
