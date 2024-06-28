<?php

use App\Models\Blog;
use App\Models\Gambar;
use App\Models\Produk;

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
if (!function_exists('produk')) {
    function produk($idProduk)
    {
        $results = Produk::where('id', $idProduk)
            ->get();
        return $results;
    }
}

if (!function_exists('truncateToSentences')) {
    function truncateToSentences($text, $numSentences = 2)
    {
        // Pecah teks menjadi array kalimat menggunakan preg_split
        $sentences = preg_split('/(?<=[.?!])\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);

        // Ambil 10 kalimat pertama
        $truncated = array_slice($sentences, 0, $numSentences);

        // Gabungkan kembali menjadi satu string
        return implode(' ', $truncated);
    }
}
