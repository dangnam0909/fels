<?php

use Illuminate\Database\Seeder;

class HistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('histories')->insert([
            'lesson_id' => '1',
            'user_id' => '1',
            'content' => 'following lesson 1',
        ]);
    }
}
