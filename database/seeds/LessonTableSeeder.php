<?php

use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            'lesson_name' => 'Bài 1',
            'picture' => 'information.jpeg',
            'description' => 'Từ vựng về phần mềm',
            'topic_id' => '1',
        ]);
    }
}
