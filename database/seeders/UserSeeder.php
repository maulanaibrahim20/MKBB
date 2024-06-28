<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Gambar;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

        //customer sekaligus penjual
        $user = User::create([
            'name' => 'customer Penjual',
            'email' => 'customer@gmail.com',
            'role' => '2',
            'password' => bcrypt('password'),
        ]);
        $customer = Customer::create([
            'user_id' => $user['id'],
            'alamat' => 'Jl. Raya No. 1',
            'noTelp' => '081234567890',
            'status' => 'penjual',
        ]);
        $toko = Toko::create([
            'id_customer' => $customer['id'],
            'namaToko' => 'Toko MKBB',
            'slug' => 'toko-mkbb',
            'alamat' => 'Jl. Raya No. 1',
            'noTelpToko' => '081234567890',
        ]);

        //customer only
        $user = User::create([
            'name' => 'customer Only',
            'email' => 'customerOnly@gmail.com',
            'role' => '2',
            'password' => bcrypt('password'),
        ]);
        $customer = Customer::create([
            'user_id' => $user['id'],
            'alamat' => 'Jl. Raya No. 2',
            'noTelp' => '081234567891',
            'status' => 'pembeli',
        ]);

        $sourcePaths = [
            public_path('images/1.jpg'),
            public_path('images/2.jpg'),
            public_path('images/3.jpg'),
            public_path('images/4.jpg')
        ];

        $destinationFolder = 'produk';
        $destinationFileNames = [
            '13.jpg',
            '14.jpg',
            '15.jpg',
            '16.jpg'
        ];

        if (!Storage::disk('public')->exists($destinationFolder)) {
            Storage::disk('public')->makeDirectory($destinationFolder);
        }

        $destinationPaths = [];
        foreach ($sourcePaths as $index => $sourcePath) {
            $destinationFileName = $destinationFileNames[$index];
            $destinationPath = $destinationFolder . '/' . $destinationFileName;
            Storage::disk('public')->put($destinationPath, File::get($sourcePath));
            $destinationPaths[] = $destinationPath;
        }

        $produk = Produk::create([
            'toko_id' => $toko['id'],
            'kategoriProduk' => 'kaos-gambar',
            'namaProduk' => 'Kaos Bergambar',
            'deskripsiProduk' => 'Kaos bergambar dengan bahan katun',
            'slug' => 'kaos-bergambar',
            'stok' => '5',
            'harga' => '500000',
            'ukuran' => 'S',
            'warnaProduk' => 'Merah',
        ]);

        foreach ($destinationPaths as $gambarPath) {
            Gambar::create([
                'produk_id' => $produk['id'],
                'gambar' => $gambarPath,
            ]);
        }
    }
}
