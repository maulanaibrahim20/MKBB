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
            DB::beginTransaction();

            $keranjang = Keranjang::where('customer_id', Auth::user()->customer->id)
                ->where('status', 'keranjang')
                ->first();
            if (!$keranjang) {
                // Jika tidak ada, buat keranjang baru
                $keranjang = Keranjang::create([
                    'customer_id' => Auth::user()->customer->id,
                    'status' => 'keranjang',
                ]);
            }
            KeranjangProduk::create([
                'toko_id' => $request->toko_id,
                'customer_id' => Auth::user()->customer->id,
                'keranjang_id' => $keranjang->id,
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
        $keranjang = KeranjangProduk::where('id', $id)->first();
        $params['qty'] = $keranjang->qty + 1;
        $params['harga'] = $keranjang->harga + $produk;
        $keranjang->update($params);
        return back()->with('success', 'success');
    }

    public function minuscart(Request $request, $id)
    {
        $produk = Produk::pluck('harga')->first();
        $keranjang = KeranjangProduk::where('id', $id)->first();
        $params['qty'] = $keranjang->qty - 1;
        $params['harga'] = $keranjang->harga - $produk;
        $keranjang->update($params);
        return back()->with('success', 'success');
    }

    public function checkout()
    {
        $keranjang = KeranjangProduk::where('customer_id', Auth::user()->customer->id)->first();
        $customer = KeranjangProduk::where('customer_id', Auth::user()->customer->id)->get();
        // dd($keranjang);
        $data = [
            'keranjang' => $keranjang,
            'customer' => $customer,
        ];
        return view('Frontend.chekout', $data);
    }

    public function checkoutProduk(Request $request)
    {
        try {
            DB::beginTransaction();

            if ($request->payment == null) {
                return back()->with('error', 'Pilih salah satu metode pembayaran.');
            }

            $keranjang = Keranjang::where('customer_id', Auth::user()->customer->id)
                ->where('status', 'keranjang')
                ->firstOrFail();
            $keranjangProduks = KeranjangProduk::where('keranjang_id', $keranjang->id)->get();

            $checkout = Checkout::create([
                'tipeTransaksi' => $request->payment,
                'keranjang_id' => $keranjang->id,
                'customer_id' => Auth::user()->customer->id,
                'toko_id' => $keranjangProduks->pluck('toko_id')->first(), // Anda mungkin ingin mengambil toko_id yang sesuai
                'statusPengiriman' => 'belum_dikirim',
                'tanggal' => now(),
                'totalHarga' => $request->total,
                'status' => $request->payment == 'COD' ? 'sudah bayar' : 'belum bayar',
            ]);

            foreach ($keranjangProduks as $keranjangProduk) {
                $produk = Produk::findOrFail($keranjangProduk->produk_id);

                if ($produk->stok < $keranjangProduk->qty) {
                    throw new \Exception('Stok tidak mencukupi untuk produk: ' . $produk->namaProduk);
                }

                $produk->stok -= $keranjangProduk->qty;
                $produk->save();

                CheckoutDetail::create([
                    'checkout_id' => $checkout->id,
                    'produk_id' => $keranjangProduk->produk_id,
                    'qtyProduk' => $keranjangProduk->qty,
                    'hargaProduk' => $keranjangProduk->harga,
                ]);
            }

            $keranjang->update(['status' => 'checkout']);

            DB::commit();
            return redirect('/')->with('success', 'Checkout berhasil.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
        }
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
