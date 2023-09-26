<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Specialization;
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
        $specializations_ids = Specialization::pluck('id')->toArray();


        $doctor = new Doctor();
        $doctor->user_id = 1;
        $doctor->profile_photo = $faker->imageUrl(200, 200);
        $doctor->cv = $faker->text(50);
        $doctor->phone_number = $faker->phoneNumber();
        $doctor->address = $faker->address();
        $doctor->performances = $faker->text(100);
        $doctor->description = $faker->text();
        $doctor->save();

        $doctor_specializations = [];
        foreach ($specializations_ids as $specialization) {
            if (rand(0, 1)) $doctor_specializations[] = $specialization;
        }
        $doctor->specializations()->attach($doctor_specializations);
    }
}
