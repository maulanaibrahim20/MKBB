<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function checkoutDetail()
    {
        return $this->hasMany(CheckoutDetail::class, 'checkout_id');
    }
}
