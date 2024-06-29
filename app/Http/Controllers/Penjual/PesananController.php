<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\CheckoutDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $data['produk'] = CheckoutDetail::where('checkout_details.toko_id', Auth::user()->customer->toko->id)
            ->join('checkouts', 'checkout_details.checkout_id', '=', 'checkouts.id')
            ->where('checkouts.statusPengiriman', 'belum_dikirim')
            ->select('checkout_details.*', 'checkouts.totalHarga', 'checkouts.status', 'checkouts.statusPengiriman') // Pilih kolom yang ingin Anda ambil
            ->get();
        // dd($data);
        return view('penjual.pesanan', $data);
    }

    public function changeStatus($id)
    {
        try {
            $checkout = Checkout::findOrFail($id);

            $checkout->update([
                'statusPengiriman' => 'dikirim',
            ]);

            return redirect()->back()->with('success', 'Status pesanan berhasil diubah.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function pesananDikirim()
    {
        $data['produk'] = CheckoutDetail::where('checkout_details.toko_id', Auth::user()->customer->toko->id)
            ->join('checkouts', 'checkout_details.checkout_id', '=', 'checkouts.id')
            ->where('checkouts.statusPengiriman', 'dikirim')
            ->select('checkout_details.*', 'checkouts.totalHarga', 'checkouts.status', 'checkouts.statusPengiriman') // Pilih kolom yang ingin Anda ambil
            ->get();
        return view('penjual.pesanan2', $data);
    }
}
