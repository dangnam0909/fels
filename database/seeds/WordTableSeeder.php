<?php

use Illuminate\Database\Seeder;

class WordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->insert([
            'word_name' => 'information',
            'picture' => 'information.jpeg',
            'sound' => 'information.mp3',
            'translate' => 'thông tin',
            'status' => '0',
            'lesson_id' => '1',
            'user_id' => '1',
        ]);
    }
}
