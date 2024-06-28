<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

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
}
