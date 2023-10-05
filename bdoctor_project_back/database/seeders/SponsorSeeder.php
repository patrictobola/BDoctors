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
        // Creazione di 3 sponsor
        for ($i = 0; $i < 3; $i++) {
            $sponsor = new Sponsor();

            // setta il nome e il costo di ogni sponsor
            if ($i === 0) {
                $sponsor->name = 'silver';
                $sponsor->cost = 2.99;
            } elseif ($i === 1) {
                $sponsor->name = 'gold';
                $sponsor->cost = 5.99;
            } else {
                $sponsor->name = 'platinum';
                $sponsor->cost = 9.99;
            }

            $sponsor->type = $faker->text(10);
            $sponsor->save();
        }
    }
}
