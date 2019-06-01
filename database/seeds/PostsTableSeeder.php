<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Posts');

        for ($i = 0; $i < 15; $i++) {
            DB::table('posts')->insert([
                'created_by' => 1,
                'title' => $faker->sentence,
                'body' => $faker->paragraph(2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        for ($i = 0; $i < 25; $i++) {
            DB::table('posts')->insert([
                'created_by' => 2,
                'title' => $faker->sentence,
                'body' => $faker->paragraph(2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
