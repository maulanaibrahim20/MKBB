<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualController extends Controller
{
    public function penjual(){
        return view ('penjual/penjual');
    }
    public function penjualan(){
        return view ('penjual/penjualan');
    }
    public function pesanan(){
        return view ('penjual/pesanan');
    }
    public function pesanan2(){
        return view ('penjual/pesanan2');
    }
    public function produk(){
        return view ('penjual/produk');
    }
    public function profil(){
        return view ('penjual/profil');
    }
    public function riwayat(){
        return view ('penjual/riwayat');
    }
}
