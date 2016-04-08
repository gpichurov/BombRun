<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'name' => env('ADMIN_NAME'),
                'email' => env('ADMIN_EMAIL'),
                'password' => bcrypt(env('ADMIN_PASSWORD')),
                'admin' => true,
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User1',
                'email' => 'user1@abv.bg',
                'password' => bcrypt('user1pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 4213,
                'kills' => 2324,
                'scrolls' => 2314,
                'games' => 2143,
                'best_score' => 1000,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User2',
                'email' => 'user2@abv.bg',
                'password' => bcrypt('user2pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 1343,
                'kills' => 4253,
                'scrolls' => 2164,
                'games' => 2713,
                'best_score' => 1100,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User3',
                'email' => 'user3@abv.bg',
                'password' => bcrypt('user3pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 1313,
                'kills' => 4223,
                'scrolls' => 2134,
                'games' => 2413,
                'best_score' => 1200,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User4',
                'email' => 'user4@abv.bg',
                'password' => bcrypt('user4pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 1353,
                'kills' => 4623,
                'scrolls' => 2714,
                'games' => 2813,
                'best_score' => 1300,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User5',
                'email' => 'user5@abv.bg',
                'password' => bcrypt('user5pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 1933,
                'kills' => 4273,
                'scrolls' => 2104,
                'games' => 2513,
                'best_score' => 1400,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User6',
                'email' => 'user6@abv.bg',
                'password' => bcrypt('user6pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 1133,
                'kills' => 2423,
                'scrolls' => 3214,
                'games' => 4213,
                'best_score' => 1500,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User7',
                'email' => 'user7@abv.bg',
                'password' => bcrypt('user7pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 5133,
                'kills' => 6423,
                'scrolls' => 6214,
                'games' => 7213,
                'best_score' => 1600,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User8',
                'email' => 'user8@abv.bg',
                'password' => bcrypt('user8pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 8133,
                'kills' => 9423,
                'scrolls' => 1214,
                'games' => 2213,
                'best_score' => 1700,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User9',
                'email' => 'user9@abv.bg',
                'password' => bcrypt('user9pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 3133,
                'kills' => 4423,
                'scrolls' => 2144,
                'games' => 2153,
                'best_score' => 1800,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User10',
                'email' => 'user10@abv.bg',
                'password' => bcrypt('user10pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 1335,
                'kills' => 4236,
                'scrolls' => 2147,
                'games' => 2138,
                'best_score' => 1900,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User11',
                'email' => 'user11@abv.bg',
                'password' => bcrypt('user11pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'coins' => 1331,
                'kills' => 4232,
                'scrolls' => 2143,
                'games' => 2138,
                'best_score' => 2000,
            ]);

    }
}
