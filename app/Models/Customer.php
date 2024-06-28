<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function toko()
    {
        return $this->hasOne(Toko::class, 'id_customer');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
