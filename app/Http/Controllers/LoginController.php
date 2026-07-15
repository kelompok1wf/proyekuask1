<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pemilik;
use App\Models\Staff;

class LoginController extends Controller
{

    // HALAMAN PILIHAN LOGIN
    public function showLogin()
    {
        // Jika pemilik sudah login
        if (session()->has('id_pemilik') && session('role') === 'Pemilik') {
            return redirect()->route('dashboard.pemilik');
        }


        // Jika staff sudah login
        if (session()->has('id_staff')) {

            if (session('role_staff') === 'Pelayan') {
                return redirect()->route('dashboard.pelayan');
            }

            if (session('role_staff') === 'Koki') {
                return redirect()->route('dashboard.koki');
            }

            if (session('role_staff') === 'Kasir') {
                return redirect()->route('dashboard.kasir');
            }
        }


        return view('auth.login');
    }



    // LOGIN PEMILIK
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $pemilik = Pemilik::where('username', $request->username)->first();


        if ($pemilik && Hash::check($request->password, $pemilik->password)) {


            // hapus session staff
            $request->session()->forget([
                'id_staff',
                'nama_staff',
                'role_staff'
            ]);


            session([
                'id_pemilik' => $pemilik->id_pemilik,
                'nama_pemilik' => $pemilik->nama_pemilik,
                'role' => 'Pemilik',
            ]);


            return redirect()->route('dashboard.pemilik');
        }


        return back()->with('error', 'Username atau password salah.');
    }



    // DASHBOARD PEMILIK
    public function dashboardPemilik()
    {
        if (!session()->has('id_pemilik') || session('role') !== 'Pemilik') {

            return redirect()->route('login.pemilik')
                ->with('error', 'Silakan login sebagai pemilik terlebih dahulu.');
        }


        return view('dashboard.pemilik');
    }



    // HALAMAN LOGIN STAFF
    public function showLoginStaff()
    {

        if (session()->has('id_staff')) {


            if (session('role_staff') === 'Pelayan') {
                return redirect()->route('dashboard.pelayan');
            }


            if (session('role_staff') === 'Koki') {
                return redirect()->route('dashboard.koki');
            }


            if (session('role_staff') === 'Kasir') {
                return redirect()->route('dashboard.kasir');
            }
        }


        return view('auth.login_staff');
    }




    // LOGIN STAFF
    public function prosesLoginStaff(Request $request)
    {

        $request->validate([
            'nama_staff' => 'required',
            'role_staff' => 'required',
            'password' => 'required',
        ]);



        $staff = Staff::where('nama_staff', $request->nama_staff)
            ->where('role_staff', $request->role_staff)
            ->first();



        if ($staff && Hash::check($request->password, $staff->password)) {


            // hapus session pemilik
            $request->session()->forget([
                'id_pemilik',
                'nama_pemilik',
                'role'
            ]);



            session([
                'id_staff' => $staff->id_staff,
                'nama_staff' => $staff->nama_staff,
                'role_staff' => $staff->role_staff,
            ]);



            if ($staff->role_staff === 'Pelayan') {
                return redirect()->route('dashboard.pelayan');
            }


            if ($staff->role_staff === 'Koki') {
                return redirect()->route('dashboard.koki');
            }


            if ($staff->role_staff === 'Kasir') {
                return redirect()->route('dashboard.kasir');
            }
        }


        return back()->with('error', 'Nama staff, role, atau password salah.');
    }




    // DASHBOARD PELAYAN
    public function dashboardPelayan()
    {
        if (!session()->has('id_staff') || session('role_staff') !== 'Pelayan') {

            return redirect()->route('login.staff')
                ->with('error', 'Silakan login sebagai pelayan terlebih dahulu.');
        }


        return view('dashboard.pelayan');
    }





    // DASHBOARD KOKI
    public function dashboardKoki()
    {
        if (!session()->has('id_staff') || session('role_staff') !== 'Koki') {

            return redirect()->route('login.staff')
                ->with('error', 'Silakan login sebagai koki terlebih dahulu.');
        }


        return view('dashboard.koki');
    }





    // DASHBOARD KASIR
    public function dashboardKasir()
    {
        if (!session()->has('id_staff') || session('role_staff') !== 'Kasir') {

            return redirect()->route('login.staff')
                ->with('error', 'Silakan login sebagai kasir terlebih dahulu.');
        }


        return view('dashboard.kasir');
    }

    // LOGOUT
    public function logout(Request $request)
    {

        $role = session('role');
        $roleStaff = session('role_staff');


        $request->session()->flush();



        // logout staff
        if ($roleStaff) {

            return redirect()->route('home')
                ->with('success', 'Berhasil logout.');
        }



        // logout pemilik
        if ($role === 'Pemilik') {

            return redirect()->route('home')
                ->with('success', 'Berhasil logout.');
        }



        return redirect()->route('home');
    }
}
