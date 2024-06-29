<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function keranjang()
    {
        return $this->hasMany(KeranjangProduk::class, 'keranjang_id', 'id');
    }

    public function checkout()
    {
        return $this->hasOne(Checkout::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id');
    }
}
