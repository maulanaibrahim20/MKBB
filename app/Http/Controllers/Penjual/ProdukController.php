<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Gambar;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    protected $produk;

    public function __construct(Produk $produk)
    {
        $this->produk = $produk;
    }
    public function index()
    {
        $data['produk'] = $this->produk->where('toko_id', Auth::user()->customer->toko->id)->get();
        return view('penjual.produk.index', $data);
    }

    public function create()
    {
        return view('penjual.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategoriProduk' => 'required|in:kaos-gambar,kaos-polos,kemeja,jaket,sweter',
            'namaProduk' => 'required|string|max:255',
            'deskripsiProduk' => 'required|string',
            'harga' => 'required|numeric',
            'ukuran' => 'required|in:S,M,L,XL,XXL',
            'stok' => 'required|integer',
            'warnaProduk' => 'required|string|max:7',
            'foto-produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();
            $fotoProduk = $this->uploadFotoProduk($request);

            $produk = Produk::create([
                'toko_id' => Auth::user()->customer->toko->id,
                'kategoriProduk' => $request->kategoriProduk,
                'namaProduk' => $request->namaProduk,
                'deskripsiProduk' => $request->deskripsiProduk,
                'slug' => Str::slug($request->namaProduk),
                'harga' => $request->harga,
                'ukuran' => $request->ukuran,
                'stok' => $request->stok,
                'warnaProduk' => $request->warnaProduk,
                'statusProduk' => 'tersedia',
            ]);

            Gambar::create([
                'produk_id' => $produk->id,
                'gambar' => $fotoProduk,
            ]);

            DB::commit();
            return redirect('/penjual/produk/index')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function uploadFotoProduk($request)
    {
        if ($request->hasFile('foto-produk')) {
            $file = $request->file('foto-produk');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('produk', $filename, 'public');
            return $path;
        }

        throw new \Exception('Gambar produk tidak ditemukan');
    }

    public function edit($id)
    {
        $data['produk'] = $this->produk->findOrFail($id);
        return view('penjual.produk.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'kategoriProduk' => 'required|in:kaos-gambar,kaos-polos,kemeja,jaket,sweter',
            'namaProduk' => 'required|string|max:255',
            'deskripsiProduk' => 'required|string',
            'harga' => 'required|numeric',
            'ukuran' => 'required|in:S,M,L,XL,XXL',
            'stok' => 'required|integer',
            'warnaProduk' => 'required|string|max:7',
            'foto-produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();
            $produk = $this->produk->findOrFail($request->id);
            $fotoProduk = $produk->gambar->gambar; // Ambil nama file gambar lama

            if ($request->hasFile('foto-produk')) {
                // Jika ada file gambar baru, hapus gambar lama
                $this->deleteFotoProduk($produk->gambar->gambar);
                $fotoProduk = $this->uploadFotoProduk($request);
            }

            $produk->update([
                'kategoriProduk' => $request->kategoriProduk,
                'namaProduk' => $request->namaProduk,
                'deskripsiProduk' => $request->deskripsiProduk,
                'slug' => Str::slug($request->namaProduk),
                'harga' => $request->harga,
                'ukuran' => $request->ukuran,
                'stok' => $request->stok,
                'warnaProduk' => $request->warnaProduk,
                'statusProduk' => 'tersedia',
            ]);

            // Update nama gambar di tabel Gambar
            $produk->gambar()->update([
                'gambar' => $fotoProduk,
            ]);

            DB::commit();
            return redirect('/penjual/produk/index')->with('success', 'Produk berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function deleteFotoProduk($filename)
    {
        Storage::disk('public')->delete('produk/' . $filename);
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $produk = $this->produk->findOrFail($id);

            // Hapus gambar terlebih dahulu jika diperlukan
            $this->deleteFotoProduk($produk->gambar->gambar);

            $produk->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
