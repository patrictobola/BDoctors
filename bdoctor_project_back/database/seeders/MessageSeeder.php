<?php

namespace Database\Seeders;

use App\Models\Message;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 100; $i++) {
            $vote = new Message();
            $vote->doctor_id = 1;
            $vote->name = $faker->name();
            $vote->last_name = $faker->lastName();
            $vote->text = $faker->text();
            $vote->email = $faker->email();
            $vote->save();
        }
    }
}
