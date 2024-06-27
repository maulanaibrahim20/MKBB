<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function checkout()
    {
        return view('Frontend.chekout');
    }

    public function detail()
    {
        return view('frontend.detail');
    }

    public function product()
    {
        return view('frontend.product');
    }

    public function blogs()
    {
        return view('frontend.blogs');
    }

    public function info()
    {
        return view('frontend.info');
    }
}
