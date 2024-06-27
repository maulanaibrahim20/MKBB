<?php

use App\Models\Blog;
use App\Models\Gambar;

if (!function_exists('blogs')) {
    function blogs()
    {
        $results = Blog::where('id', 1)->first();
        return $results;
    }
}

if (!function_exists('gambarproduk')) {
    function gambarproduk($idproduk)
    {
        $results = Gambar::where('produk_id', $idproduk)->get();
        return $results;
    }
}
