<?php

use Illuminate\Database\Seeder;

class TagThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) { 
            DB::table('tag_thread')->insert([
                'thread_id' => rand(1, 30),
                'tag_id'    => rand(1, 20),
            ]);
        }
    }
}
