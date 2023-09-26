<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $sponsor = new Sponsor();
        $sponsor->type = $faker->text(10);
        $sponsor->cost = $faker->randomFloat(2, 1, 9);
        $sponsor->name = $faker->name();
        $sponsor->save();
    }
}
