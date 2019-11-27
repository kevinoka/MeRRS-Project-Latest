<?php

use Illuminate\Database\Seeder;

class RequestPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create(); //import library faker

        $limit = 9; //batasan berapa banyak data

        for ($i = 0; $i < $limit; $i++) {
            DB::table('request')->insert([ //mengisi data di database
                'id' => $faker->id, //unique id
                'schedule' => $faker->schedule,
                'title' => $faker->title,
                'room' => $faker->room,
                'personNum' => $faker->personNum,
                'frequency' => $faker->frequency,
                'description' => $faker->description,
                'requestedBy' => $faker->requestedBy,
                'action' => $faker->action,
            ]);
        }
    }
}
