<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\text;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $doctor = new Doctor();
        $doctor->profile_photo = $faker->imageUrl(200, 200);
        $doctor->cv = $faker->text(50);
        $doctor->phone_number = $faker->phoneNumber();
        $doctor->address = $faker->address();
        $doctor->performances = $faker->text(100);
        $doctor->description = $faker->text();
        $doctor->save();
    }
}
