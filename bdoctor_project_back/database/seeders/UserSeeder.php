<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {

            $user = new User();
            $user->email = $faker->email();
            $user->name = 'Mario';
            $user->last_name = 'Rossi';
            $user->password = bcrypt('team4');
            $user->save();
        }
    }
}
