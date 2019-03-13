<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'full_name' => 'nguyen dang nam',
            'email' => 'dangnam@gmail.com',
            'password' => bcrypt('dangnam123'),
            'gender' => 1,
            'avatar' => 'avatar.jpg',
            'date_of_birthday' => '1997/10/04',
            'role_id' => '1',
            'provider_user_id' => '',
            'provider' => '',
            'remember_token' => '',
        ]);
    }
}
