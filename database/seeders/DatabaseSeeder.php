<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $path = 'database/sql_files/countries.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Country table seeded!');


        $path = 'database/sql_files/client_oauth.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('client table seeded!');
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
