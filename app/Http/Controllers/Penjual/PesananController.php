<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\CheckoutDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PesananController extends Controller
{
    public function index()
    {
        $data['produk'] = CheckoutDetail::where('checkout_details.toko_id', Auth::user()->customer->toko->id)
            ->join('checkouts', 'checkout_details.checkout_id', '=', 'checkouts.id')
            ->where('checkouts.statusPengiriman', 'belum_dikirim')
            ->select('checkout_details.*', 'checkouts.totalHarga', 'checkouts.status', 'checkouts.statusPengiriman', 'checkouts.keranjang_id')
            // ->with(['produk.ukuran', 'produk.warna', 'checkout.customer.user', 'produk.designBaju'])
            ->get();
        // $data['produk'] = CheckoutDetail::where('checkout_details.toko_id', Auth::user()->customer->toko->id)->get();
        // dd($data);

        return view('penjual.pesanan', $data);
    }

    public function changeStatus($id)
    {
        try {
            $checkout = Checkout::findOrFail($id);

            $checkout->update([
                'statusPengiriman' => 'dikirim',
                'tanggalPengiriman' => Date::now(),
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
    public function riwayatPesanan()
    {
        $data['produk'] = CheckoutDetail::where('checkout_details.toko_id', Auth::user()->customer->toko->id)
            ->join('checkouts', 'checkout_details.checkout_id', '=', 'checkouts.id')
            ->where('checkouts.status', 'selesai')
            ->where('checkouts.statusPengiriman', 'diterima')
            ->select('checkout_details.*', 'checkouts.totalHarga', 'checkouts.status', 'checkouts.statusPengiriman') // Pilih kolom yang ingin Anda ambil
            ->get();
        return view('penjual.riwayat', $data);
    }
    public function hasilPenjualan()
    {
        $data['produk'] = CheckoutDetail::where('checkout_details.toko_id', Auth::user()->customer->toko->id)
            ->join('checkouts', 'checkout_details.checkout_id', '=', 'checkouts.id')
            ->where('checkouts.status', 'selesai')
            ->where('checkouts.statusPengiriman', 'diterima')
            ->select('checkout_details.*', 'checkouts.totalHarga', 'checkouts.status', 'checkouts.statusPengiriman') // Pilih kolom yang ingin Anda ambil
            ->get();
        return view('penjual.hasil', $data);
    }
}
