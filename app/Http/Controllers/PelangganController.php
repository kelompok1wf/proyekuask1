<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function welcome() {
        return view('pelanggan.welcome');
    }

    public function register(Request $request) {
        $layanan = $request->query('layanan');
        
        if (!in_repeat($layanan, ['dine-in', 'take-away'])) {
            $layanan = 'dine-in'; 
        }

        return view('pelanggan.register', compact('layanan'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'jenis_layanan' => 'required|in:dine-in,take-away',
            'no_meja' => 'required_if:jenis_layanan,dine-in|nullable|integer',
        ]);

        $pelanggan = Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'jenis_layanan' => $request->jenis_layanan,
            'no_meja' => $request->jenis_layanan == 'dine-in' ? $request->no_meja : null,
        ]);

        session([
            'id_pelanggan' => $pelanggan->id_pelanggan,
            'nama_pelanggan' => $pelanggan->nama_pelanggan,
            'no_meja' => $pelanggan->no_meja,
            'jenis_layanan' => $pelanggan->jenis_layanan
        ]);

        return redirect()->route('pesanan.index');
    }
}
