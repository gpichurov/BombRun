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
                'name' => 'Bombs',
                'description' => '5 Bombs',
                'price' => 5,
                'number' => 5,
                'available' => 99999,
                'category' => 'bombs'
            ]);
        DB::table('items')
            ->insert([
                'name' => 'Bombs',
                'description' => '10 Bombs',
                'price' => 10,
                'number' => 10,
                'available' => 99999,
                'category' => 'bombs'
            ]);
        DB::table('items')
            ->insert([
                'name' => 'Energy',
                'description' => '5 Energy',
                'price' => 5,
                'number' => 5,
                'available' => 99999,
                'category' => 'energy'
            ]);
        DB::table('items')
            ->insert([
                'name' => 'Energy',
                'description' => '10 Energy',
                'price' => 10,
                'number' => 10,
                'available' => 99999,
                'category' => 'energy'
            ]);
    }
}
