<?php

namespace Database\Seeders;

use App\Models\Review;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 100; $i++) {

            $doctor = new Review();
            $doctor->doctor_id = $faker->numberBetween(1, 10);
            $doctor->name = $faker->name();
            $doctor->text = $faker->text(50);
            $doctor->email = $faker->email();
            $doctor->save();
        }
    }
}
