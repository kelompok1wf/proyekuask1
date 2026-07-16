<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Ayam Geprek Bossku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #fcfcfc;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        .mobile-container {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            min-height: 100vh;
            padding: 30px 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .status-success {
            color: #2e7d32;
            font-weight: 800;
            font-size: 20px;
            text-align: center;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .bill-card {
            background: #ffffff;
            border: 1px solid #eef0f2;
            border-radius: 24px;
            padding: 24px 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.02);
            text-align: center;
        }

        .bill-title {
            color: #c92c2c;
            font-weight: 800;
            font-size: 20px;
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }

        .bill-subtitle {
            color: #666;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 14px;
        }

        .badge-status {
            background-color: #e8f5e9;
            color: #2e7d32;
            font-weight: 700;
            font-size: 11px;
            padding: 6px 16px;
            border-radius: 20px;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 24px;
        }

        .divider {
            border-top: 1px dashed #e0e0e0;
            margin: 16px 0;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 10px;
            color: #444;
        }

        .info-label {
            color: #666;
        }

        .info-value {
            font-weight: 600;
            color: #222;
        }

        .item-row {
            text-align: left;
            margin-bottom: 12px;
        }

        .item-main {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 14px;
            color: #222;
        }

        .item-sub {
            font-size: 12px;
            color: #888;
            margin-top: 2px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 6px;
        }

        .total-label {
            font-weight: 800;
            font-size: 16px;
            color: #c92c2c;
        }

        .total-value {
            font-weight: 800;
            font-size: 18px;
            color: #c92c2c;
        }

        .note-footer {
            font-size: 12px;
            color: #888;
            font-style: italic;
            line-height: 1.5;
            margin-top: 24px;
            padding: 0 10px;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-reset-order {
            background-color: #f5f5f5;
            color: #222;
            border: none;
            border-radius: 16px;
            padding: 14px;
            font-weight: 700;
            font-size: 15px;
            width: 100%;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-reset-order:hover {
            background-color: #eee;
            color: #000;
        }

        .btn-logout-order {
            background: linear-gradient(90deg, #dc3545, #c92c2c);
            color: white;
            border: none;
            border-radius: 16px;
            padding: 14px;
            font-weight: 700;
            font-size: 15px;
            width: 100%;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
        }

        .btn-logout-order:hover {
            opacity: 0.95;
            color: white;
        }
    </style>
</head>

<body>

    <div class="mobile-container">
        <div>
            <div class="status-success">
                <i class="fa-solid fa-circle-check"></i> Pesanan Berhasil
            </div>

            <div class="bill-card">
                <div class="bill-title">AYAM GEPREK BOSSKU</div>
                <div class="bill-subtitle">Level Pedas! Gak Ada Mati-Nya!</div>

                <div class="badge-status">DAPUR DIPROSES</div>

                <div class="info-row">
                    <div class="info-label">Nama Pelanggan:</div>
                    <div class="info-value">{{ $order->customer->name ?? session('customer')['name'] ?? 'Pelanggan' }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Nomor Meja:</div>
                    <div class="info-value">{{ $order->customer->table_number ?? session('customer')['table_number'] ?? '00' }}</div>
                </div>

                <!-- SEKSI PERBAIKAN JAM (DIKUNCI KE ASIA/JAKARTA) -->
                <div class="info-row">
                    <div class="info-label">Waktu Order:</div>
                    <div class="info-value">
                        @php
                        // Memaksa PHP menggunakan zona waktu Jakarta
                        date_default_timezone_set('Asia/Jakarta');

                        // Jika ada data dari database, konversi ke zona waktu Jakarta sebelum diformat
                        if (isset($order) && $order->created_at) {
                        echo $order->created_at->timezone('Asia/Jakarta')->format('H.i');
                        } else {
                        echo date('H.i');
                        }
                        @endphp WIB
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">ID Transaksi:</div>
                    <div class="info-value">#AGB-{{ $order->id ?? rand(1000, 9999) }}</div>
                </div>

                <div class="divider"></div>

                <!-- Menampilkan Menu Berdasarkan Data Database / Fallback -->
                @php $calculatedSubtotal = 0; @endphp
                @if(isset($order) && $order->items)
                @foreach($order->items as $item)
                @php
                // Auto-detect kolom harga (menghindari Rp 0)
                $pricePerItem = $item->price ?? $item->harga ?? ($item->menu->price ?? $item->menu->harga ?? 0);
                if($pricePerItem == 0 && isset($order->total_price) && $order->items->count() > 0) {
                // Antisipasi darurat jika item kosong tapi total ada
                $pricePerItem = $order->total_price / $order->items->count();
                }
                $calculatedSubtotal += $pricePerItem * $item->quantity;
                @endphp
                <div class="item-row">
                    <div class="item-main">
                        <div>
                            {{ $item->menu->name ?? $item->name }}
                            @if(isset($item->level) && $item->level > 0)
                            <span class="badge bg-danger text-white" style="font-size:10px;">Lvl {{ $item->level }}</span>
                            @endif
                        </div>
                        <div>Rp {{ number_format($pricePerItem * $item->quantity, 0, ',', '.') }}</div>
                    </div>
                    <div class="item-sub">{{ $item->quantity }} x Rp {{ number_format($pricePerItem, 0, ',', '.') }}</div>
                </div>
                @endforeach
                @else
                <p class="text-muted font-italic small">Data menu sedang dimuat...</p>
                @endif

                <div class="divider"></div>

                <div class="info-row">
                    <div class="info-label">Subtotal</div>
                    <div class="info-value" style="font-weight: 500;">Rp {{ number_format($order->total_price ?? $calculatedSubtotal, 0, ',', '.') }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Pajak (10%)</div>
                    <div class="info-value" style="font-weight: 500; color: #888;">Rp 0</div>
                </div>

                <div class="divider" style="border-top-style: dotted;"></div>

                <div class="total-row">
                    <div class="total-label">Total Bayar</div>
                    <div class="total-value">Rp {{ number_format($order->total_price ?? $calculatedSubtotal, 0, ',', '.') }}</div>
                </div>

                <div class="note-footer">
                    Mohon tunggu ya Bossku, koki kami sedang meracik hidangan pedas pesanan Anda!
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="/menu" class="btn-reset-order">
                Pesan Menu Baru <i class="fa-solid fa-rotate-left ms-1"></i>
            </a>
            <a href="{{ route('pelanggan.logout') }}" class="btn-logout-order">
                Keluar
                <i class="fa-solid fa-arrow-right-from-bracket ms-1"></i>
            </a>
        </div>
    </div>

</body>

</html>