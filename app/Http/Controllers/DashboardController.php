<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('Admin.admin');
    }

    public function penjual()
    {
        $toko_id = Auth::user()->customer->toko->id;

        $data = [
            'produkYangDiUpload' => Produk::where('toko_id', $toko_id)->count(),
            'produkYangDiTerima' => CheckoutDetail::where('checkout_details.toko_id', Auth::user()->customer->toko->id)
                ->join('checkouts', 'checkout_details.checkout_id', '=', 'checkouts.id')
                ->where('checkouts.statusPengiriman', 'diterima')
                ->select('checkout_details.*', 'checkouts.totalHarga', 'checkouts.status', 'checkouts.statusPengiriman')
                ->count(),
            'produkYangDiKirim' => CheckoutDetail::where('checkout_details.toko_id', Auth::user()->customer->toko->id)
                ->join('checkouts', 'checkout_details.checkout_id', '=', 'checkouts.id')
                ->where('checkouts.statusPengiriman', 'dikirim')
                ->select('checkout_details.*', 'checkouts.totalHarga', 'checkouts.status', 'checkouts.statusPengiriman')
                ->count(),
            'produkYangTelahTerjual' => CheckoutDetail::where('checkout_details.toko_id', Auth::user()->customer->toko->id)
                ->join('checkouts', 'checkout_details.checkout_id', '=', 'checkouts.id')
                ->where('checkouts.status', 'selesai')
                ->select('checkout_details.*', 'checkouts.totalHarga', 'checkouts.status', 'checkouts.statusPengiriman')
                ->count(),
        ];
        return view('penjual.penjual', $data);
    }
}
