<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'id' => '1',
            'name' => 'Admin KitaSchool',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);
        User::create([
            'id' => '2',
            'name' => 'Operator KitaSchool',
            'username' => 'Operator',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'operator',
        ]);
    }
}
