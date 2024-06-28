<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function customer()
    {
        $customer = Customer::where('status', 'pembeli')->get();
        $data['customer'] = $customer;
        return view('Admin.Tcustom', $data);
    }
    public function penjual()
    {
        $customer = Customer::where('status', 'penjual')->get();
        $data['customer'] = $customer;
        return view('Admin.Tpenjual', $data);
    }
}
