<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\KeranjangProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data['keranjang'] = KeranjangProduk::where('customer_id', Auth::user()->customer->id)->get();
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
        // dd($request->quantity);
        $produk = Produk::where('id', $id)->first();
        $keranjang = KeranjangProduk::where('produk_id', $id)->first();
        $params['qty'] = $keranjang->qty + 1;
        $params['harga'] = $keranjang->harga + $produk->harga;
        $keranjang->update($params);
        return back()->with('success', 'success');
    }
    public function minuscart(Request $request, $id)
    {
        $keranjang = KeranjangProduk::where('produk_id', $id)->first();
        $produk = Produk::where('id', $id)->first();
        $params['qty'] = $keranjang->qty - 1;
        $params['harga'] = $keranjang->harga - $produk->harga;
        // dd($params['qty']);
        $keranjang->update($params);
        return back()->with('success', 'success');
    }

    public function checkout()
    {
        return view('Frontend.chekout');
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
