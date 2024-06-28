<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $data['produk'] = Checkout::where('toko_id', Auth::user()->customer->toko->id)
            ->get();
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
        $data['produk'] = Checkout::where('toko_id', Auth::user()->customer->toko->id)
            ->where('statusPengiriman', 'dikirim')
            ->get();
        return view('penjual.pesanan2', $data);
    }
}
