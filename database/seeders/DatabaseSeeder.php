<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\contractor;
use App\Models\engineer;
use App\Models\laboratorie;
use App\Models\Project;
use App\Models\specialtie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(UserSeder::class);
        // specialtie::factory(2)->create();
        // laboratorie::factory(4)->create();
        // contractor::factory(30)->create();
        // engineer::factory(30)->create();
        specialtie::create([
            'specialization_name' => 'test',
        ]);
        engineer::create([
            'engineer_number' => 10,
            'engineer_name' => 'eng1',
            'mobile_number' => '0595',
            'specialization_name' => 'test',
        ]);
        contractor::create([
            'Contractor_name' => 'cont1',
            'Building classification' => 'first_class',
        ]);
        laboratorie::create([
            'Laboratory_name' => 'lab1',
            'Laboratory_address' => 'add1',
        ]);

        // Project::factory(30)->create();
    }
}
