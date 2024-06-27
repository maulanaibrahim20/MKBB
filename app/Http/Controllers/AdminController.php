<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view ('Admin/admin');
    }
    public function blog(){
        return view ('Admin/blog');
    }
    public function Tcustom(){
        return view ('Admin/Tcustom');
    }
    public function Tpenjual(){
        return view ('Admin/Tpenjual');
    }
    public function Tproduk(){
        return view ('Admin/Tproduk');
    }
    public function Tlogin(){
        return view ('Admin/Tlogin');
    }
    
}
