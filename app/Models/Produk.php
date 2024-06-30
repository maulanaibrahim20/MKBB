<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function gambar()
    {
        return $this->hasMany(Gambar::class, 'produk_id', 'id');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }

    public function ukuran()
    {
        return $this->hasMany(UkuranProduk::class, 'produk_id', 'id');
    }

    public function warna()
    {
        return $this->hasMany(WarnaProduk::class, 'produk_id', 'id');
    }
    public function designBaju()
    {
        return $this->hasOne(DesignBaju::class, 'produk_id');
    }
}
