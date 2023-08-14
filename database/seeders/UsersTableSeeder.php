<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'a@b.com',
            'password' => bcrypt('password'),
        ]);
        \DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'c@d.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
