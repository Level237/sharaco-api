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
        User::create([
            'userName'=>"martin",
            'lastName'=>"Brams",
            'firstName'=>"Martin",
            'email'=>"Bramslevel129@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
            'isCompany'=>0,
            'phone_number'=>"690394365",
            'profession_id'=>1,
        ],
        );
    }
}
