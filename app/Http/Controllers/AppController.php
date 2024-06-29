<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    protected $produk;

    public function __construct()
    {
        $this->produk = new Produk();
    }



    public function produkDetail($id)
    {
        $data['produkDetail'] = $this->produk::where('id', $id)->first();
        return view('frontend.detail', $data);
    }

    public function buatToko(Request $request)
    {
        $params = $request->only(['namaToko', 'alamat', 'noTelpToko', 'id_customer']);
        $params['slug'] = Str::slug($params['namaToko']);

        $customer = Customer::find(Auth::user()->customer->id);

        try {
            Toko::create($params);
            $customer->update(['status' => 'penjual'],);

            return back()->with('success', 'Toko berhasil dibuat dan status diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat membuat toko: ' . $e->getMessage());
        }
    }

    public function profile()
    {
        $data['profile'] = Customer::where('user_id', Auth::user()->id)->first();
        return view('Frontend.info', $data);
    }
}
