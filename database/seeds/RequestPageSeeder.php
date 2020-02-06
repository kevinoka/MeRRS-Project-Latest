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
        $faker = Faker\Factory::create(); //import the faker library

        $limit = 9; //limit the amount of data

        for ($i = 0; $i < $limit; $i++) {
            DB::table('request')->insert([ //fill the data in database
                'id' => $faker->id, //unique id
                'start' => $faker->start,
                'end' => $faker->end,
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
