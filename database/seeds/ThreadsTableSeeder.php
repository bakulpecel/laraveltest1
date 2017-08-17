<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) { 
            DB::table('threads')->insert([
                'user_id'    => 1,
                'subject'    => $title = $faker->sentence,
                'slug'       => str_slug($title . '-' . str_random(6)),
                'body'       => $faker->text,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
