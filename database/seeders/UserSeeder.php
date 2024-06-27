<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Toko;
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


        $user = User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'role' => '2',
            'password' => bcrypt('password'),
        ]);
        $customer = Customer::create([
            'user_id' => $user->id,
            'alamat' => 'Jl. Raya No. 1',
            'noTelp' => '081234567890',
            'status' => 'penjual',
        ]);
        Toko::create([
            'id_customer' => $customer->id,
            'namaToko' => 'Toko MKBB',
            'slug' => 'toko-mkbb',
            'alamat' => 'Jl. Raya No. 1',
            'noTelpToko' => '081234567890',
        ]);
    }
}
