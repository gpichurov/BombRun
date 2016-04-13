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
                'best_score' => 10000,
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
                'best_score' => 11000,
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
                'best_score' => 12000,
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
                'best_score' => 13000,
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
                'best_score' => 14000,
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
                'best_score' => 15000,
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
                'best_score' => 16000,
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
                'best_score' => 17000,
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
                'best_score' => 18000,
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
                'best_score' => 19000,
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
                'best_score' => 20000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
