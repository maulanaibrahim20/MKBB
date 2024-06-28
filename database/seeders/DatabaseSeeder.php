<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        $this->call([
            UserSeeder::class,
        ]);

        $sourcePath = public_path('images/13.jpg');

        // Define the destination folder and file name
        $destinationFolder = 'uploads/blog';
        $destinationFileName = '13.jpg';

        // Ensure the directory exists
        if (!Storage::disk('public')->exists($destinationFolder)) {
            Storage::disk('public')->makeDirectory($destinationFolder);
        }

        // Define the full destination path
        $destinationPath = $destinationFolder . '/' . $destinationFileName;

        // Copy the file to the destination path
        Storage::disk('public')->put($destinationPath, File::get($sourcePath));

        Blog::create([
            'gambar' => $destinationPath,
            'judul' => 'IMPOR PAKAIAN BEKAS ILEGAL: INDONESIA ‘MENJADI PENAMPUNG SAMPAH’ DAN DIANGGAP ‘TIDAK PUNYA MARTABAT’',
            'deskripsi' => 'Kementerian Perdagangan gencar menyita pakaian bekas impor bernilai miliaran rupiah. Namun aksi ini masih kalah cepat dengan peredaran produk ilegal itu di pasaran. Jual-beli pakaian bekas impor masih marak di sejumlah daerah di Indonesia, salah satunya di Kota Bandung. Bangunan lusuh serupa gudang dengan tulisan “Pasar Cimol Gedebage” tampak sesak. Pengunjung dan pembeli berjubel, berbagi ruang dengan deretan pakaian beragam merek, dan hanya menyisakan lorong sempit untuk berlalu-lalang. Para pedagang penuh semangat menawarkan barangnya, berteriak saling bersahutan, ”Dipilih… dipilih… dipilih.” Di sebuah akhir pekan pada Agustus 2022 itu, suasana di Pasar Cimol tampak ramai, setelah hampir dua tahun ke belakang sepi akibat pandemi Covid-19.',
        ]);
    }
}
