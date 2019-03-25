<?php

use Illuminate\Database\Seeder;
use App\Models\Word;
Use App\Models\User;

class MemoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('memories')->insert([
	        'user_id' => '1',
	        'word_id' => '1'
	        'status' => '0'
	        'learn_time' => Carbon\Carbon::now(),
	    ]);
    }
}
