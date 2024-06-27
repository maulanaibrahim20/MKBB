<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login()
    {
        return view('auth.login');
    }

    public function loginProccess(Request $request)
    {
        $user = $this->user->whereEmail($request->email)->first();
        if (!$user) {
            return redirect('/login')->with('error', 'Periksa kembali Email dan Password Anda!');
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Periksa kembali Email dan Password Anda!');
        }

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();

            if ($user->role == 1) {
                return redirect()->to('/admin/dashboard')->with('success', 'Anda Berhasil Login. Selamat Datang, ' . Auth::user()->nama);
            } elseif ($user->role == 2) {
                return redirect('/')->with('success', 'Anda Berhasil Login. Selamat Datang, ' . Auth::user()->nama);
            }
        }
        return back()->with('error', 'Gagal melakukan autentikasi');
    }
}
