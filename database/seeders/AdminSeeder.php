<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'userName'=>"Admin",
            'lastName'=>"Admin",
            'firstName'=>"Admin",
            'email'=>"admin@sharaco.com",
            'role_id'=>1,
            'password'=>bcrypt('password'),
            'isCompany'=>0,
            'phone_number'=>"690562832",
        ],
        );
    }
}
