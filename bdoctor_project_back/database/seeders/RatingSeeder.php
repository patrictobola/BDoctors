<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Rating;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 30; $i++) {
            $vote = new Rating();
            $vote->vote = $faker->numberBetween(1, 5);
            $vote->save();
        }
    }
}
