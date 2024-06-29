<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Gambar;
use App\Models\Produk;
use App\Models\UkuranProduk;
use App\Models\WarnaProduk;
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
        $produk = $this->produk
            ->where('toko_id', Auth::user()->customer->toko->id)
            ->with('ukuran', 'warna')
            ->get();

        return view('penjual.produk.index', compact('produk'));
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
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ukuran' => 'required|array',
            'warnaProduk' => 'required|array',
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
                'stok' => $request->stok,
                'statusProduk' => 'tersedia',
            ]);
            foreach ($request->ukuran as $ukuran) {
                UkuranProduk::create([
                    'produk_id' => $produk->id,
                    'ukuran' => $ukuran,
                ]);
            }

            // Simpan warna produk
            foreach ($request->warnaProduk as $warna) {
                WarnaProduk::create([
                    'produk_id' => $produk->id,
                    'warna' => $warna,
                ]);
            }

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
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategoriProduk' => 'required|in:kaos-gambar,kaos-polos,kemeja,jaket,sweter',
            'namaProduk' => 'required|string|max:255',
            'deskripsiProduk' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ukuran' => 'required|array',
            'warnaProduk' => 'required|array',
        ]);

        try {
            DB::beginTransaction();

            // Ambil produk berdasarkan ID
            $produk = Produk::findOrFail($id);

            // Simpan nama file gambar lama
            $fotoProduk = $produk->gambar; // Misalnya 'gambar_produk.jpg'

            // Jika ada gambar baru diunggah, hapus gambar lama
            if ($request->hasFile('gambar')) {
                $this->deleteFotoProduk($fotoProduk);
                $fotoProduk = $this->uploadFotoProduk($request);
            }

            // Update informasi produk
            $produk->update([
                'kategoriProduk' => $request->kategoriProduk,
                'namaProduk' => $request->namaProduk,
                'deskripsiProduk' => $request->deskripsiProduk,
                'slug' => Str::slug($request->namaProduk),
                'harga' => $request->harga,
                'stok' => $request->stok,
                'statusProduk' => 'tersedia',
            ]);

            // Update ukuran produk
            $produk->ukuran()->delete(); // Hapus semua ukuran produk terkait
            foreach ($request->ukuran as $ukuran) {
                UkuranProduk::create([
                    'produk_id' => $produk->id,
                    'ukuran' => $ukuran,
                ]);
            }

            // Update warna produk
            $produk->warna()->delete(); // Hapus semua warna produk terkait
            foreach ($request->warnaProduk as $warna) {
                WarnaProduk::create([
                    'produk_id' => $produk->id,
                    'warna' => $warna,
                ]);
            }

            // Simpan gambar baru jika ada
            if ($request->hasFile('gambar')) {
                Gambar::where('produk_id', $produk->id)->update([
                    'gambar' => $fotoProduk,
                ]);
            }

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

            // Ambil produk berdasarkan ID
            $produk = Produk::findOrFail($id);

            // Hapus gambar terlebih dahulu jika ada
            $gambar = Gambar::where('produk_id', $produk->id)->first();
            if ($gambar) {
                $this->deleteFotoProduk($gambar->gambar);
            }

            // Hapus produk dari database
            $produk->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
