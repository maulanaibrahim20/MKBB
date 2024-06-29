<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutDetail extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }
}
