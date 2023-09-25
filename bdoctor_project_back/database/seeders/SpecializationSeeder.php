<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $specialization = new Specialization();
        $specialization->name = $faker->text(10);
        $specialization->description = $faker->text();
        $specialization->save();
    }
}
