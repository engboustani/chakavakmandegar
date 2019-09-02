<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $faker = Faker::create();
        foreach (range(1,5) as $i) {
            $event = \App\Event::create(['title' => $faker->sentence(4), 'content' => $faker->paragraph,]);
            foreach (range(1,4) as $j) {
                $eventtime = \App\Eventtime::create(['start' => $faker->dateTime, 'end' => $faker->dateTime, 'deadline' => $faker->dateTime, 'event_id' => $event->id,]);
            }
        }
    }
}
