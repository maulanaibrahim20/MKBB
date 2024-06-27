<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('Admin.admin');
    }

    public function penjual()
    {
        return view('penjual.penjual');
    }
}
