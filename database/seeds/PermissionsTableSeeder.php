<?php

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
            'permission' => '*'
        ]);

        DB::table('permissions')->insert([
            'role_id' => '2',
            'permission' => '/posts*'
        ]);

        DB::table('permissions')->insert([
            'role_id' => '2',
            'permission' => '!*'
        ]);


    }
}
