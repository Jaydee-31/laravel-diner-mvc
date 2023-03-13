<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {

        //Seed the application's bookings table with random data .
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('bookings')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'date' => $faker->date(),
                'time' => $faker->time(),
                'people' => $faker->numberBetween(1, 10),
                'message' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            
            ]);
        }
        // $this->call([
        //     BookingSeeder::class,
        // ]);
    }
}
