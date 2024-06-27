<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        return view('penjual.produk.produk');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|in:kaos-gambar,jaket,sweter,kemeja,kaos-polos',
            'namaProduk' => 'required|string|max:255',
            'deskripsiProduk' => 'required|string',
            'harga' => 'required|numeric',
            'ukuran' => 'required|in:S,M,L,XL,XXL',
            'foto-produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $fotoProduk = $this->uploadFotoProduk($request);
            Produk::create([
                'toko_id' => Auth::user()->toko->id,
                'kategoriProduk' => $request->kategori,
                'namaProduk' => $request->namaProduk,
                'deskripsiProduk' => $request->deskripsiProduk,
                'slug' => Str::slug($request->namaProduk, '-'),
                'stok' => $request->stok ?? 'tersedia',
                'harga' => $request->harga,
                'ukuran' => $request->ukuran,
                'warnaProduk' => $request->warnaProduk ?? 'Tidak axda warna', // Default warna
                'statusProduk' => $request->statusProduk ?? 'tersedia', // Default status produk tersedia
                'fotoProduk' => $fotoProduk,

            ]);

            return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function uploadFotoProduk($request)
    {
        if ($request->hasFile('foto-produk')) {
            $file = $request->file('foto-produk');
            $path = $file->store('produk', 'public');
            return $path;
        }

        throw new \Exception('Gambar produk tidak ditemukan');
    }
}
