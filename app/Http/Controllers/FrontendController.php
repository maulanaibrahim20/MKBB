<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutDetail;
use App\Models\Keranjang;
use App\Models\KeranjangProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $data['produk'] = Produk::all();
        return view('frontend.index', $data);
    }

    public function cart()
    {
        $data['keranjang'] = KeranjangProduk::select('keranjang_produks.*')
            ->join('keranjangs', 'keranjang_produks.keranjang_id', '=', 'keranjangs.id')
            ->where('keranjangs.status', 'keranjang')
            ->where('keranjang_produks.customer_id', Auth::user()->customer->id)
            ->get();

        return view('frontend.cart', $data);
    }

    public function cartPost(Request $request)
    {
        try {
            DB::begintransaction();

            $keranjangId = Keranjang::create([
                'customer_id' => Auth::user()->customer->id,
                'toko_id' =>  $request->toko_id,
                'status' => 'keranjang',

            ]);

            KeranjangProduk::create([
                'customer_id' => Auth::user()->customer->id,
                'keranjang_id' => $keranjangId['id'],
                'produk_id' => $request->produk_id,
                'qty' => 1,
                'harga' => $request->harga
            ]);

            DB::commit();
            return back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function pluscart(Request $request, $id)
    {
        $produk = Produk::pluck('harga')->first();
        $keranjang = KeranjangProduk::where('keranjang_id', $id)->first();
        $params['qty'] = $keranjang->qty + 1;
        $params['harga'] = $keranjang->harga + $produk;
        $keranjang->update($params);
        return back()->with('success', 'success');
    }
    public function minuscart(Request $request, $id)
    {
        $keranjang = KeranjangProduk::where('keranjang_id', $id)->first();
        $produk = Produk::pluck('harga')->first();
        $params['qty'] = $keranjang->qty - 1;
        $params['harga'] = $keranjang->harga - $produk;
        $keranjang->update($params);
        return back()->with('success', 'success');
    }

    public function checkout($id)
    {
        $keranjang = KeranjangProduk::where('keranjang_id', $id)->first();
        // dd($keranjang);
        $data['keranjang'] = $keranjang;
        return view('Frontend.chekout', $data);
    }

    public function checkoutProduk(Request $request, $id)
    {
        if ($request->payment == null) {
            return back()->with('error', 'pilih salah satu payment');
        }
        $keranjang = Keranjang::where('id', $id)->firstOrFail();

        // Populate the parameters
        $params = $request->all();
        $params['tipeTransaksi'] = $request->payment;
        $params['keranjang_id'] = $id;
        $params['customer_id'] = Auth::user()->customer->id;
        $params['toko_id'] = $keranjang->toko_id;
        $params['tanggal'] = now();
        $params['totalHarga'] = $request->total;
        $params['status'] = $request->payment == 'COD' ? 'sudah bayar' : 'belum bayar';
        $params['statusPengiriman'] = 'belum_dikirim';

        // Buat entri checkout
        $checkout = Checkout::create($params);

        // Iterasi melalui ID produk dan buat detail checkout
        foreach ($request->produkId as $produkId) {
            $keranjangProduk = KeranjangProduk::where('keranjang_id', $id)
                ->where('produk_id', $produkId)
                ->firstOrFail();

            // Kurangi stok produk
            $produk = Produk::findOrFail($produkId);
            if ($produk->stok < $keranjangProduk->qty) {
                return back()->with('error', 'Not enough stock for product: ' . $produk->namaProduk);
            }
            $produk->stok -= $keranjangProduk->qty;
            $produk->save();

            CheckoutDetail::create([
                'checkout_id' => $checkout->id,
                'produk_id' => $produkId,
                'qtyProduk' => $keranjangProduk->qty,
                'hargaProduk' => $keranjangProduk->produk->harga,
            ]);
        }

        // Update status keranjang menjadi 'checkout'
        $keranjang->update(['status' => 'checkout']);

        return redirect('/')->with('success', 'Checkout successful');
    }
    public function deletecart($id)
    {
        KeranjangProduk::where('keranjang_id', $id)->delete();

        // Menghapus record dari tabel 'keranjangs'
        Keranjang::find($id)->delete();

        return redirect()->back()->with('success', 'Item keranjang berhasil dihapus.');
    }
    public function detail()
    {
        return view('frontend.detail');
    }

    public function product()
    {
        $data['produk'] = Produk::all();
        return view('frontend.product', $data);
    }

    public function blogs()
    {
        return view('frontend.blogs');
    }

    public function info()
    {
        return view('frontend.info');
    }
}
