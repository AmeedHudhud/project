<?php

namespace Database\Seeders;

use App\Models\contractor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractorsSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        contractor::create([
            'id' => '10',
            'Contractor_name'=>'con1',
            'Building classification'=>'first_class'
        ]);
        contractor::create([
            'id' => '20',
            'Contractor_name'=>'con2',
            'Building classification'=>'second_class'
        ]);
        contractor::create([
            'id' => '30',
            'Contractor_name'=>'con3',
            'Building classification'=>'first_class'
        ]);
    }
}
