<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pemilik;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pemilik = Pemilik::where('username', $request->username)->first();

        if ($pemilik && Hash::check($request->password, $pemilik->password)) {
            session([
                'id_pemilik' => $pemilik->id_pemilik,
                'nama_pemilik' => $pemilik->nama_pemilik,
                'role' => 'Pemilik',
            ]);

            return redirect()->route('dashboard.pemilik');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function dashboardPemilik()
    {
        if (!session()->has('id_pemilik')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('dashboard.pemilik');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}