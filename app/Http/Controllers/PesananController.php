<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    private function getMasterMenu() {
        return [
            ['id' => 1, 'name' => 'Ayam Geprek Original + Nasi', 'price' => 15000, 'desc' => 'Ayam goreng renyah panas digeprek sambal bawang pedas khas nusantara.'],
            ['id' => 2, 'name' => 'Ayam Geprek Mozzarella + Nasi', 'price' => 22000, 'desc' => 'Ayam geprek gurih diselimuti lelehan keju mozzarella molor premium.'],
            ['id' => 3, 'name' => 'Ayam Geprek Sambal Ijo + Nasi', 'price' => 17000, 'desc' => 'Kombinasi ayam geprek krispi dengan kepedasan segar sambal cabai hijau.'],
            ['id' => 4, 'name' => 'Es Teh Manis Jumbo', 'price' => 5000, 'desc' => 'Es teh manis segar ukuran porsi besar, penawar rasa pedas paling ampuh.'],
            ['id' => 5, 'name' => 'Es Jeruk Peras Murni', 'price' => 7000, 'desc' => 'Perasan jeruk lokal segar asli berpadu es batu penyejuk tenggorokan.']
        ];
    }

    public function index() {
        if(!session()->has('id_pelanggan')) {
            return redirect()->route('pelanggan.welcome');
        }

        $menus = $this->getMasterMenu();
        return view('pesanan.index', compact('menus'));
    }

    public function checkout(Request $request) {
        $cartItems = json_decode($request->cart_data, true);
        
        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Keranjang belanja kosong!');
        }

        $masterMenu = $this->getMasterMenu();
        $detailPesananArray = [];
        $totalHarga = 0;

        foreach ($cartItems as $id => $qty) {
            
            $menuKey = array_search($id, array_column($masterMenu, 'id'));
            if ($menuKey !== false) {
                $produk = $masterMenu[$menuKey];
                $subtotal = $produk['price'] * $qty;
                $totalHarga += $subtotal;

                $detailPesananArray[] = [
                    'nama' => $produk['name'],
                    'qty' => $qty,
                    'harga' => $produk['price'],
                    'subtotal' => $subtotal
                ];
            }
        }

        // 1. Bagian Simpan Data ke Tabel Pesanans
        $pesanan = Pesanan::create([
            'id_pelanggan' => session('id_pelanggan'),
            'detail_pesanan' => json_encode($detailPesananArray),
            'total_harga' => $totalHarga,
            'status_pesanan' => 'Diterima'
        ]);

        // 2. Bagian Simpan Data ke Tabel Pembayarans (otomatis)
        Pembayaran::create([
            'id_pesanan' => $pesanan->id_pesanan,
            'tanggal_bayar' => now(),
            'status_pembayaran' => 'Belum Dibayar'
        ]);

        return redirect()->route('pesanan.nota', $pesanan->id_pesanan);
        
    }

    public function nota($id_pesanan) {
        $pesanan = Pesanan::with('pelangan', 'pembayaran')->findOrFail($id_pesanan);
        $details = json_decode($pesanan->detail_pesanan, true);

        return view('pembayaran.nota', compact('pesanan', 'details'));
    }

    // --- FITUR DAPUR KOKI ---
    public function indexDapur() {
        $pesanans = Pesanan::with('pelanggan')
            ->whereIn('status_pesanan', ['Diterima', 'Sedang Dibuat', 'Sudah Dibuat'])
            ->get();
        return view('dapur.index', compact('pesanans'));
    }

    public function updateDapur(Request $request, $id_pesanan) {
        $pesanan = Pesanan::findOrFail($id_pesanan);
        $pesanan->update(['status_pesanan' => $request->status_pesanan]);
        return redirect()->back();
    }
}
