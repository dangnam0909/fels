<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'test_id' => '1',
            'question_type' => 'Test word of vocalory',
            'constent' => 'Test word',
            'option' => '1',
            'is_correct' => true,
        ]);
    }
}
