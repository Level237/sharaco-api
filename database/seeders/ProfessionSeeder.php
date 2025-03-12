<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profession::create([
            'name' => 'Développeur',
        ]);
        Profession::create([
            'name' => 'Designer',
        ]);
        Profession::create([
            'name' => 'Marketing',
        ]);
        Profession::create([
            'name' => 'Communication',
        ]);
        Profession::create([
            'name' => 'Consultant',
        ]);
        Profession::create([
            'name' => 'Comptable',
        ]);
        Profession::create([
            'name' => 'Autres',
        ]);
        
        
        
        
    }
}
