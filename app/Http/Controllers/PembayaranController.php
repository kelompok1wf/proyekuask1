<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index() {
        $tagihans = Pembayaran::with('pesanan.pelangan')
            ->where('status_pembayaran', 'Belum Bayar')
            ->get();
        return view('pembayaran.index', compact('tagihans'));
    }

    public function prosesBayar($id_pembayaran) {
        $pembayaran = Pembayaran::findOrFail($id_pembayaran);
        $pembayaran->update([
            'status_pembayaran' => 'Lunas',
            'tanggal_bayar' => now()
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi Lunas!');
    }
}
