@extends('layouts.admin')

@section('content')
<!-- Header & Tombol Cetak Lama -->
<div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
    <div>
        <h1 class="fw-bold mb-1" style="color: #c92c2c;">Ayam Geprek Bossku</h1>
        <p class="text-muted mb-0" style="font-size: 14px;">Data Transaksi Real-time Restoran (Laporan {{ ucfirst($filter) }})</p>
    </div>
    <!-- Tombol Kembali Dashboard -->

    <a href="{{ route('dashboard.pemilik') }}"
        class="btn px-4 py-2 fw-bold text-white shadow-sm"
        style="
            background: linear-gradient(135deg, #c92c2c, #ff761b);
            border: none;
            border-radius: 8px;
        ">

        <i class="fa-solid fa-arrow-left me-2"></i>
        Kembali ke Dashboard

    </a>
    <!-- Button Keren Seperti Sebelumnya -->
    <button onclick="window.print()" class="btn px-4 py-2 fw-bold text-white shadow-sm" style="background: linear-gradient(135deg, #ff5722, #ff9800); border: none; border-radius: 8px;">
        <i class="fa-solid fa-print me-2"></i> Cetak Laporan
    </button>
</div>

<!-- Kartu Ringkasan (Dinamis Terfilter) -->
<div class="row g-3 mb-4">
    <div class="col-12 col-md-4">
        <div class="card card-metric bg-bossku-gradient p-4 text-white h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase fw-bold opacity-75 small mb-1">Total Pendapatan</h6>
                    <h3 class="fw-bold mb-0">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                </div>
                <i class="fa-solid fa-money-bill-wave fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card card-metric p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase fw-bold text-muted small mb-1">Pesanan Sukses</h6>
                    <h3 class="fw-bold mb-0 text-success">{{ $pesananSukses }} Transaksi</h3>
                </div>
                <i class="fa-solid fa-bowl-rice fa-2x text-warning"></i>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card card-metric p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase fw-bold text-muted small mb-1">Pelanggan</h6>
                    <h3 class="fw-bold mb-0" style="color: #c92c2c;">{{ $pelangganUnik }} Orang</h3>
                </div>
                <i class="fa-solid fa-users fa-2x text-danger"></i>
            </div>
        </div>
    </div>
</div>

<!-- Grafik Tren Omzet -->
<div class="card card-metric mb-4 p-3 p-md-4">
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-3 gap-2">
        <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-chart-line me-2" style="color: #ff761b;"></i> Grafik Tren Omzet</h5>

        <ul class="nav nav-pills gap-1 p-1 bg-light rounded-3" style="border: 1px solid #eee;">
            <li class="nav-item">
                <a class="nav-link px-3 py-1 fw-bold small text-dark {{ $filter == 'harian' ? 'active bg-danger text-white' : '' }}" href="?filter=harian">Harian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 py-1 fw-bold small text-dark {{ $filter == 'mingguan' ? 'active bg-danger text-white' : '' }}" href="?filter=mingguan">Mingguan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 py-1 fw-bold small text-dark {{ $filter == 'bulanan' ? 'active bg-danger text-white' : '' }}" href="?filter=bulanan">Bulanan</a>
            </li>
        </ul>
    </div>
    <div style="height: 250px; position: relative; width: 100%;">
        <canvas id="salesChart"></canvas>
    </div>
</div>

<!-- Informasi Tabel Terfilter -->
<div class="row g-4 mb-4">
    <!-- Menu Paling Banyak Dipesan Sesuai Filter -->
    <div class="col-12 col-lg-5">
        <div class="card card-metric p-3 p-md-4 h-100">
            <h5 class="fw-bold mb-3 text-dark"><i class="fa-solid fa-fire text-danger me-2"></i> Menu Paling Laris</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Menu</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topMenus as $item)
                        <tr>
                            <td><strong class="text-dark small">{{ $item->menu->name ?? 'Menu Terhapus' }}</strong></td>
                            <td class="text-center"><span class="badge bg-light text-dark border px-2 py-1 small" style="font-size: 11px;">{{ $item->menu->category ?? '-' }}</span></td>
                            <td class="text-center"><span class="badge px-2.5 py-1.5 text-white" style="background-color: #c92c2c; font-size: 11px;">{{ $item->total_qty }} Porsi</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-3 small">Belum ada pesanan menu di periode ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Riwayat Transaksi Sesuai Filter -->
    <div class="col-12 col-lg-7">
        <div class="card card-metric p-3 p-md-4 h-100">
            <h5 class="fw-bold mb-3 text-dark"><i class="fa-solid fa-file-invoice text-warning me-2"></i> Riwayat Transaksi</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Pelanggan</th>
                            <th class="text-center">Meja</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayatPesanan as $pesanan)
                        <tr>
                            <td>
                                <strong class="text-dark small d-block">{{ $pesanan->customer_name }}</strong>
                                <span class="text-muted" style="font-size: 10px;">{{ $pesanan->created_at->isoFormat('D MMMM Y, HH:mm') }} WIB</span>
                            </td>
                            <td class="text-center"><span class="badge bg-warning text-dark px-2 py-1 fw-bold" style="font-size: 11px;">{{ $pesanan->table_number }}</span></td>
                            <td><strong class="text-success small">Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</strong></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4 small">Tidak ada transaksi di periode ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('salesChart').getContext('2d');


    new Chart(ctx, {

        type: 'line',

        data: {

            labels: @json($chartLabels),

            datasets: [{

                label: 'Omzet Penjualan (Rp)',

                data: @json($chartValues),

                backgroundColor: 'rgba(255, 78, 80, 0.05)',

                borderColor: '#ff4e50',

                borderWidth: 3,

                tension: 0.35,

                fill: true,

                pointBackgroundColor: '#ff761b',

                pointRadius: 3

            }]

        },


        options: {

            responsive: true,

            maintainAspectRatio: false,

            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {

                        callback: function(value) {

                            return 'Rp ' + value.toLocaleString('id-ID');

                        }

                    }

                }

            }

        }

    });
</script>

@endsection