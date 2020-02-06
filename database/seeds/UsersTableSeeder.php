<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Admin Min',
            'username' => 'admin',
            'email' => 'admin@mail.co.id',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'User Ser',
            'username' => 'user',
            'email' => 'user@mail.co.id',
            'password' => bcrypt('user123'),
        ]);
    }
}
