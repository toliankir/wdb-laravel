<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'role_id' => '1',
            'permission' => '*',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'role_id' => '2',
            'permission' => '/posts*',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('permissions')->insert([
            'role_id' => '2',
            'permission' => '!*',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


    }
}
