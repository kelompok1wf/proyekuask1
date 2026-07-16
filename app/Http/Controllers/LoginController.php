<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Pemilik;
use App\Models\Staff;
use App\Models\Order;


class LoginController extends Controller
{


    // =============================
    // LOGIN PEMILIK
    // =============================

    public function showLogin()
    {

        if (session()->has('id_pemilik') && session('role') === 'Pemilik') {

            return redirect()->route('dashboard.pemilik');
        }


        return view('auth.login');
    }




    public function prosesLogin(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);



        $pemilik = Pemilik::where('username', $request->username)
            ->first();



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

                'role' => 'Pemilik'

            ]);



            return redirect()
                ->route('dashboard.pemilik');
        }



        return back()
            ->with('error', 'Username atau password salah.');
    }






    // =============================
    // DASHBOARD PEMILIK
    // =============================


    public function dashboardPemilik()
    {

        if (
            !session()->has('id_pemilik') ||
            session('role') !== 'Pemilik'
        ) {


            return redirect()
                ->route('login.pemilik')
                ->with('error', 'Silakan login sebagai pemilik terlebih dahulu.');
        }



        return view('dashboard.pemilik');
    }







    // =============================
    // LOGIN STAFF
    // =============================


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

                'role_staff' => $staff->role_staff

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





        return back()
            ->with('error', 'Nama staff, role, atau password salah.');
    }

    // =============================
    // DASHBOARD PELAYAN
    // =============================

    public function dashboardPelayan()
    {

        $pesananBaru = Order::with([
            'customer',
            'items.menu'
        ])
            ->where('status', 'Pending')
            ->latest()
            ->get();



        $pesananDiproses = Order::with([
            'customer',
            'items.menu'
        ])
            ->where('status', 'Diproses')
            ->latest()
            ->get();



        $pesananSiap = Order::with([
            'customer',
            'items.menu'
        ])
            ->where('status', 'Siap Disajikan')
            ->latest()
            ->get();



        return view('dashboard.pelayan', compact(
            'pesananBaru',
            'pesananDiproses',
            'pesananSiap'
        ));
    }

    // =============================
    // KONFIRMASI PESANAN PELAYAN
    // =============================


    public function konfirmasiPesanan($id)
    {


        $order = Order::findOrFail($id);




        $order->update([

            'status' => 'Diproses'

        ]);





        return redirect()

            ->route('dashboard.pelayan')

            ->with(
                'success',
                'Pesanan diteruskan ke dapur'
            );
    }

    // =============================
    // DASHBOARD KOKI
    // =============================

    public function dashboardKoki()
    {

        if (
            !session()->has('id_staff') ||
            session('role_staff') !== 'Koki'
        ) {

            return redirect()
                ->route('login.staff')
                ->with(
                    'error',
                    'Silakan login sebagai koki terlebih dahulu.'
                );
        }



        // PESANAN BARU DARI PELAYAN
        // status: Diproses

        $pesananBaruKoki = Order::with([
            'customer',
            'items.menu'
        ])
            ->where('status', 'Diproses')
            ->latest()
            ->get();




        // PESANAN YANG SEDANG DIMASAK

        $pesananMasak = Order::with([
            'customer',
            'items.menu'
        ])
            ->where('status', 'Dimasak')
            ->latest()
            ->get();




        // PESANAN SELESAI MASAK

        $pesananSiap = Order::with([
            'customer',
            'items.menu'
        ])
            ->where('status', 'Siap Disajikan')
            ->latest()
            ->get();





        return view('dashboard.koki', compact(
            'pesananBaruKoki',
            'pesananMasak',
            'pesananSiap'
        ));
    }

    // =============================
    // DASHBOARD KASIR
    // =============================
    public function dashboardKasir()
    {


        if (
            !session()->has('id_staff') ||
            session('role_staff') !== 'Kasir'
        ) {

            return redirect()
                ->route('login.staff');
        }



        $menungguBayar = Order::with([
            'customer',
            'items.menu'
        ])
            ->where('status', 'Menunggu Pembayaran')
            ->latest()
            ->get();




        $pembayaranSelesai = Order::with([
            'customer'
        ])
            ->where('status', 'Dibayar')
            ->latest()
            ->get();




        return view('dashboard.kasir', compact(
            'menungguBayar',
            'pembayaranSelesai'
        ));
    }

    // =============================
    // MULAI MASAK
    // =============================

    public function mulaiMasak($id)
    {

        $order = Order::findOrFail($id);


        $order->update([
            'status' => 'Dimasak'
        ]);



        return redirect()
            ->route('dashboard.koki')
            ->with(
                'success',
                'Pesanan mulai dimasak.'
            );
    }

    // =============================
    // SELESAI MASAK
    // =============================

    public function selesaiMasak($id)
    {

        $order = Order::findOrFail($id);


        $order->update([
            'status' => 'Siap Disajikan'
        ]);



        return redirect()
            ->route('dashboard.koki')
            ->with(
                'success',
                'Pesanan siap disajikan.'
            );
    }


    // ANTARKAN PESANAN

    public function antarPesanan($id)
    {

        $order = Order::findOrFail($id);


        $order->update([
            'status' => 'Menunggu Pembayaran'
        ]);


        return redirect()
            ->route('dashboard.pelayan')
            ->with(
                'success',
                'Pesanan berhasil diantar.'
            );
    }

    // =============================
    // HALAMAN PEMBAYARAN
    // =============================

    public function halamanPembayaran($id)
    {

        $order = Order::with([
            'customer',
            'items.menu'
        ])
            ->findOrFail($id);



        return view(
            'dashboard.pembayaran',
            compact('order')
        );
    }

    public function pembayaranSelesai($id)
    {

        $order = Order::findOrFail($id);


        $order->update([
            'status' => 'Dibayar'
        ]);



        return redirect()
            ->route('dashboard.kasir')
            ->with(
                'success',
                'Pembayaran berhasil.'
            );
    }

    // =============================
    // LOGOUT PEMILIK & STAFF
    // =============================


    public function logout(Request $request)
    {


        $role = session('role');

        $roleStaff = session('role_staff');




        $request->session()->flush();





        if ($roleStaff) {


            return redirect()
                ->route('home')
                ->with(
                    'success',
                    'Berhasil logout.'
                );
        }





        if ($role === 'Pemilik') {


            return redirect()
                ->route('home')
                ->with(
                    'success',
                    'Berhasil logout.'
                );
        }





        return redirect()
            ->route('home');
    }
}
