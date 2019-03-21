<?php

use Illuminate\Database\Seeder;
use App\Models\Word;

class WordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Word::class, 400)->create();
    }
}
