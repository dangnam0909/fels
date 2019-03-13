<?php

use Illuminate\Database\Seeder;

class ResultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('results')->insert([
        	'finish_time' => Carbon\Carbon::now(),
            'score' => '8',
            'user_id' => '1',
            'test_id' => '1',
        ]);
    }
}
