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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'penjual',
            'email' => 'customer@gmail.com',
            'role' => '2',
            'password' => bcrypt('password'),
        ]);
    }
}
