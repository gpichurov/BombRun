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
                'best_score' => 100,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User2',
                'email' => 'user2@abv.bg',
                'password' => bcrypt('user2pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 200,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User3',
                'email' => 'user3@abv.bg',
                'password' => bcrypt('user3pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 300,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User4',
                'email' => 'user4@abv.bg',
                'password' => bcrypt('user4pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 400,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User5',
                'email' => 'user5@abv.bg',
                'password' => bcrypt('user5pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 500,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User6',
                'email' => 'user6@abv.bg',
                'password' => bcrypt('user6pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 600,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User7',
                'email' => 'user7@abv.bg',
                'password' => bcrypt('user7pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 700,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User8',
                'email' => 'user8@abv.bg',
                'password' => bcrypt('user8pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 800,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User9',
                'email' => 'user9@abv.bg',
                'password' => bcrypt('user9pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 900,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User10',
                'email' => 'user10@abv.bg',
                'password' => bcrypt('user10pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 1000,
            ]);
        DB::table('users')
            ->insert([
                'name' => 'User11',
                'email' => 'user11@abv.bg',
                'password' => bcrypt('user11pass'),
                'big_avatar' => 'B_default.png',
                'small_avatar' => 'S_default.png',
                'best_score' => 1100,
            ]);

    }
}
