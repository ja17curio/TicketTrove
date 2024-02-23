<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User 1',
            'email' => 'boeien@boeien.nl',
            'password' => Hash::make('testtest'),
        ]);

        User::create([
            'name' => 'Test User 2',
            'email' => 'aa@aa.nl',
            'password' => Hash::make('testtest'),
        ]);

    }
}
