<?php

use Illuminate\Database\Seeder;

class UserTopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_topic')->insert([
            'user_id' => '1',
            'topic_id' => '1',
        ]);
    }
}
