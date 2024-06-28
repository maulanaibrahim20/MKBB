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
}
