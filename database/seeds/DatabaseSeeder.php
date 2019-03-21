<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TopicsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(WordTableSeeder::class);
        $this->call(TestTableSeeder::class);
        $this->call(UserTopicTableSeeder::class);
        $this->call(HistoryTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(ResultTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
    }
}
