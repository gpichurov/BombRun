<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')
            ->insert([
                'user_id' => 1,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 2,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 3,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 4,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 5,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 6,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 7,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 8,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 9,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 10,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 11,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 12,
                'money' => 100,
                'bombs' => 5,
                'energy' => 5,
                'speed' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
