<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $user, $customer;

    public function __construct(User $user, Customer $customer)
    {
        $this->user = $user;
        $this->customer = $customer;
    }

    public function index()
    {
        return view('auth.register');
    }

    public function registerProccess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 2,
            ]);

            Customer::create([
                'user_id' => $user->id,
                'gambar' => null,
                'alamat' => null,
                'noTelp' => null,
                'status' => 'pembeli',
            ]);

            DB::commit();
            return redirect('/login')->with('success', 'Register Berhasil');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Register Gagal: ' . $e->getMessage());
        }
    }
}
