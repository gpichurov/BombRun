<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')
            ->insert([
                'name' => '5 Bombs',
                'description' => 'Buy 5 Bombs for only 5 coins. Do not miss the best deal !!',
                'price' => 5,
                'number' => 5,
                'available' => 99999,
                'category' => 'bombs',
                'big_image' => 'B_def_bomb.png',
                'small_image' => 'S_def_bomb.png',
            ]);
        DB::table('items')
            ->insert([
                'name' => '10 Bombs',
                'description' => 'Buy 10 Bombs for only 8 coins. Do not miss the best deal !!',
                'price' => 8,
                'number' => 10,
                'available' => 99999,
                'category' => 'bombs',
                'big_image' => 'B_def_bomb.png',
                'small_image' => 'S_def_bomb.png',
            ]);
        DB::table('items')
            ->insert([
                'name' => '20 Bombs',
                'description' => 'Buy 20 Bombs for only 15 coins. Do not miss the best deal !!',
                'price' => 15,
                'number' => 20,
                'available' => 99999,
                'category' => 'bombs',
                'big_image' => 'B_def_bomb.png',
                'small_image' => 'S_def_bomb.png',
            ]);
        DB::table('items')
            ->insert([
                'name' => '5 Energy Potions',
                'description' => 'Buy 5 Energy Potions for only 50 coins. Do not miss the best deal !!',
                'price' => 50,
                'number' => 5,
                'available' => 99999,
                'category' => 'energy',
                'big_image' => 'B_def_energy.png',
                'small_image' => 'S_def_energy.png',
            ]);
        DB::table('items')
            ->insert([
                'name' => '10 Energy Potions',
                'description' => 'Buy 10 Energy Potions for only 100 coins. Do not miss the best deal !!',
                'price' => 80,
                'number' => 10,
                'available' => 99999,
                'category' => 'energy',
                'big_image' => 'B_def_energy.png',
                'small_image' => 'S_def_energy.png',
            ]);
        DB::table('items')
            ->insert([
                'name' => '20 Energy Potions',
                'description' => 'Buy 20 Energy Potions for only 150 coins. Do not miss the best deal !!',
                'price' => 150,
                'number' => 20,
                'available' => 99999,
                'category' => 'energy',
                'big_image' => 'B_def_energy.png',
                'small_image' => 'S_def_energy.png',
            ]);
        DB::table('items')
            ->insert([
                'name' => '5 Speed Potions',
                'description' => 'Buy 5 Energy Potions for only 50 coins. Do not miss the best deal !!',
                'price' => 50,
                'number' => 5,
                'available' => 99999,
                'category' => 'speed',
                'big_image' => 'B_def_speed.png',
                'small_image' => 'S_def_speed.png',
            ]);
        DB::table('items')
            ->insert([
                'name' => '10 Speed Potions',
                'description' => 'Buy 10 Energy Potions for only 80 coins. Do not miss the best deal !!',
                'price' => 80,
                'number' => 10,
                'available' => 99999,
                'category' => 'speed',
                'big_image' => 'B_def_speed.png',
                'small_image' => 'S_def_speed.png',
            ]);
        DB::table('items')
            ->insert([
                'name' => '20 Speed Potions',
                'description' => 'Buy 20 Energy Potions for only 150 coins. Do not miss the best deal !!',
                'price' => 150,
                'number' => 20,
                'available' => 99999,
                'category' => 'speed',
                'big_image' => 'B_def_speed.png',
                'small_image' => 'S_def_speed.png',
            ]);
    }
}
