<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutDetail;
use App\Models\Customer;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class AppController extends Controller
{
    protected $produk;

    public function __construct()
    {
        $this->produk = new Produk();
    }

    public function produkDetail($id)
    {
        $produkDetail = Produk::findOrFail($id);
        $ukuran = $produkDetail->ukuran()->pluck('ukuran')->toArray();
        $warnaProduk = $produkDetail->warna()->pluck('warna')->toArray();

        $data = [
            'produkDetail' => $produkDetail,
            'ukuran' => $ukuran,
            'warnaProduk' => $warnaProduk,
        ];
        return view('frontend.detail', $data);
    }


    public function toko()
    {
        return view('Frontend.toko');
    }

    public function buatToko(Request $request)
    {
        $params = $request->only(['namaToko', 'alamat', 'noTelpToko',]);
        $params['slug'] = Str::slug($params['namaToko']);
        $params['id_customer'] = Auth::user()->customer->id;

        $customer = Customer::find(Auth::user()->customer->id);

        try {
            Toko::create($params);
            $customer->update(['status' => 'penjual'],);

            return redirect('/')->with('success', 'Toko berhasil dibuat dan status diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat membuat toko: ' . $e->getMessage());
        }
    }

    public function profile()
    {
        $profile = Customer::where('user_id', Auth::user()->id)->first();
        $checkout = Checkout::where('customer_id', Auth::user()->customer->id)->get();
        $data = [
            'profile' => $profile,
            'checkout' => $checkout,
        ];
        // dd($data);
        return view('Frontend.info', $data);
    }
    public function updateprofile(Request $request)
    {
        // dd($request->all());
        $customer = Customer::find(Auth::user()->customer->id);
        $user = User::find(Auth::user()->id);
        try {
            $customer->update(
                [
                    'alamat' => $request->alamat,
                    'noTelp' => $request->noTelp,
                ]
            );
            $user->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                ]
            );

            return back()->with('success', 'Data Berhasil Di Update.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat Edit Profile: ' . $e->getMessage());
        }
    }

    public function selesaiPesanan($id)
    {
        try {
            $checkout = Checkout::findOrFail($id);

            $checkout->update([
                'status' => 'selesai',
                'statusPengiriman' => 'diterima',
            ]);
            return back()->with('success', 'Pesanan Telah Selesai.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Mengembalikan respons dengan pesan kesalahan jika pesanan tidak ditemukan
            return back()->with('error', 'Pesanan tidak ditemukan.');
        } catch (\Exception $e) {
            // Mengembalikan respons dengan pesan kesalahan umum
            return back()->with('error', 'Terjadi kesalahan Pesanan Selesai: ' . $e->getMessage());
        }
    }
}
