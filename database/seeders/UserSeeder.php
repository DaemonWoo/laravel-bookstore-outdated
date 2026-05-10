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
            'name' => 'admin',
            'email' => 'admin@domain.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);
        User::factory()->count(5)->create();
    }
}
