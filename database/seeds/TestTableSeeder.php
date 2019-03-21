<?php
use Illuminate\Database\Seeder;
class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert([
            'test_name' => 'dang nam',
            'lesson_id' => '1',
            'time' => Carbon\Carbon::now(),
        ]);
    }
}
