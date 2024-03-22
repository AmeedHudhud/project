<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password1'),
            'date_of_registration' => now(),
            'gender' => 'Male',
            'governorate' => 'Example Governorate',
            'mobile_number' => '1234567890',
            'date_of_birth' => '1990-01-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password2'),
            'date_of_registration' => now(),
            'gender' => 'Female',
            'governorate' => 'Another Governorate',
            'mobile_number' => '9876543210',
            'date_of_birth' => '1995-05-05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'User 3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password3'),
            'date_of_registration' => now(),
            'gender' => 'Male',
            'governorate' => 'Yet Another Governorate',
            'mobile_number' => '555444333',
            'date_of_birth' => '1985-12-15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
