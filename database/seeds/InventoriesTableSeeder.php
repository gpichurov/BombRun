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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        DB::table('inventories')
            ->insert([
                'user_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
