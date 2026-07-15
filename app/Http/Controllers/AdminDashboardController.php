<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today();
        $filter = $request->get('filter', 'harian');

        // Tentukan Range Waktu berdasarkan Filter Aktif
        if ($filter == 'mingguan') {
            $startDate = Carbon::now()->subDays(6)->startOfDay();
            $endDate = Carbon::now()->endOfDay();
        } elseif ($filter == 'bulanan') {
            $startDate = Carbon::now()->startOfMonth()->startOfDay();
            $endDate = Carbon::now()->endOfDay();
        } else {
            $startDate = Carbon::today()->startOfDay();
            $endDate = Carbon::today()->endOfDay();
        }

        // 1. Ringkasan Eksekutif (Dinamis sesuai range filter)
        $totalPendapatan = Order::where('status', '!=', 'cancelled')->whereBetween('created_at', [$startDate, $endDate])->sum('total_price');
        $pesananSukses = Order::where('status', '!=', 'cancelled')->whereBetween('created_at', [$startDate, $endDate])->count();
        $pelangganUnik = Order::where('status', '!=', 'cancelled')->whereBetween('created_at', [$startDate, $endDate])->distinct('customer_id')->count('customer_id');

        // 2. Menu Paling Banyak Dipesan (Dinamis sesuai range filter)
        $topMenus = OrderItem::select('menu_id', DB::raw('SUM(quantity) as total_qty'))
            ->whereHas('order', function ($query) use ($startDate, $endDate) {
                $query->where('status', '!=', 'cancelled')->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->with('menu')
            ->groupBy('menu_id')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();

        // 3. Riwayat Transaksi Lengkap (Dinamis sesuai range filter)
        $riwayatPesanan = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name as customer_name', 'customers.table_number')
            ->where('orders.status', '!=', 'cancelled')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->orderBy('orders.created_at', 'desc')
            ->get();

        // 4. Logika Grafik Tren Omzet
        $chartLabels = [];
        $chartValues = [];

        if ($filter == 'mingguan') {
            $weeklySales = Order::where('status', '!=', 'cancelled')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(total_price) as omzet'))
                ->groupBy('tanggal')
                ->orderBy('tanggal')
                ->pluck('omzet', 'tanggal')
                ->toArray();

            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i)->format('Y-m-d');
                $label = Carbon::now()->subDays($i)->isoFormat('dddd');
                $chartLabels[] = $label;
                $chartValues[] = $weeklySales[$date] ?? 0;
            }
        } elseif ($filter == 'bulanan') {
            $monthlySales = Order::where('status', '!=', 'cancelled')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->select(DB::raw('MONTH(created_at) as bulan'), DB::raw('SUM(total_price) as omzet'))
                ->groupBy('bulan')
                ->pluck('omzet', 'bulan')
                ->toArray();

            for ($i = 5; $i >= 0; $i--) {
                $monthNum = Carbon::now()->subMonths($i)->month;
                $label = Carbon::now()->subMonths($i)->isoFormat('MMMM');
                $chartLabels[] = $label;
                $chartValues[] = $monthlySales[$monthNum] ?? 0;
            }
        } else {
            $hourlySales = Order::where('status', '!=', 'cancelled')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->select(DB::raw('HOUR(created_at) as jam'), DB::raw('SUM(total_price) as omzet'))
                ->groupBy('jam')
                ->pluck('omzet', 'jam')
                ->toArray();

            for ($i = 9; $i <= 22; $i++) {
                $chartLabels[] = sprintf('%02d:00', $i);
                $chartValues[] = $hourlySales[$i] ?? 0;
            }
        }

        return view('dashboard.laporan_penjualan', compact(
            'totalPendapatan', 'pesananSukses', 'pelangganUnik', 
            'topMenus', 'riwayatPesanan', 'chartLabels', 'chartValues', 'filter'
        ));
    }
}