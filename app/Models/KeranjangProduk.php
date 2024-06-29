<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangProduk extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'keranjang_id');
    }
}
