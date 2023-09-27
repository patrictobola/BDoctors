<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->email = 'team4@boolean.it';
        $user->name = 'Mario';
        $user->last_name = 'Rossi';
        $user->password = bcrypt('team4');
        $user->save();
    }
}
