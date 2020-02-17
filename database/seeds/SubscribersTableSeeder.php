<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribers')->insert([
            'email' => 'aswinbuana3@gmail.com',
        ]);
    }
}
