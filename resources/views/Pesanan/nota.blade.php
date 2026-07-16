<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Nota Belanja - Ayam Geprek Bossku</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #d32f2f;
            --dark: #212121;             
            --gray: #757575;             
            --bg-light: #f8f9fa;         
            --bg-container: #ffffff;     
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Poppins', sans-serif; }
        body { background-color: var(--bg-light); display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .app-container { width: 100%; max-width: 450px; height: 100vh; background-color: var(--bg-container); position: relative; box-shadow: 0 0 40px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; padding: 24px; overflow-y: auto; }
        @media (min-height: 700px) and (min-width: 480px) { .app-container { height: 850px; border-radius: 32px; border: 8px solid #2d2d2d; } }
        
        .receipt-paper { background: white; border: 1px solid #e0e0e0; border-radius: 12px; padding: 24px; position: relative; margin-bottom: 16px; }
        .receipt-header { text-align: center; border-bottom: 1px dashed #ccc; padding-bottom: 16px; margin-bottom: 16px; }
        .receipt-brand-name { font-size: 18px; font-weight: 800; color: var(--primary); }
        .receipt-brand-sub { font-size: 11px; color: var(--gray); }
        
        /* Pewarnaan Status Masakan Dapur */
        .status-paid-badge { display: inline-block; margin-top: 8px; padding: 6px 14px; border-radius: 20px; font-weight: 800; font-size: 11px; text-transform: uppercase; }
        .status-diterima { background: #efebe9; color: #4e342e; }
        .status-proses { background: #e3f2fd; color: #0d47a1; }
        .status-siap { background: #fff8e1; color: #f57f17; }
        .status-saji { background: #e8f5e9; color: #2e7d32; }

        .receipt-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; font-size: 12px; margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px dashed #eee; }
        .meta-val { font-weight: 600; text-align: right; }
        .receipt-item-line { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 13px; }
        .receipt-grand-total { font-size: 16px; font-weight: 800; color: var(--primary); border-top: 1px dashed #eee; padding-top: 8px; margin-top: 8px; display: flex; justify-content: space-between; }
        .btn-refresh { width: 100%; padding: 14px; border: none; border-radius: 12px; font-weight: 700; background-color: #212121; color: white; cursor: pointer; margin-bottom: 10px; }
        .btn-exit { display: block; text-align: center; padding: 14px; text-decoration: none; background: #eee; color: #333; font-weight: 700; border-radius: 12px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="app-container">
        <h2 style="font-size: 20px; font-weight: 800; margin-bottom: 16px; text-align: center; color: #2e7d32;">
            <i class="fa-solid fa-circle-check"></i> Pesanan Terkirim!
        </h2>
        
        <div class="receipt-paper">
            <div class="receipt-header">
                <div class="receipt-brand-name">AYAM GEPREK BOSSKU</div>
                <div class="receipt-brand-sub">Level Pedas! Gak Ada Mati-Nya!</div>
                
                @php
                    $statusDapurClass = 'status-diterima';
                    if($pesanan->status_pesanan === 'Sedang Dibuat') $statusDapurClass = 'status-proses';
                    if($pesanan->status_pesanan === 'Sudah Dibuat') $statusDapurClass = 'status-siap';
                    if($pesanan->status_pesanan === 'Disajikan') $statusDapurClass = 'status-saji';
                @endphp
                <div class="status-paid-badge {{ $statusDapurClass }}">
                    Koki: {{ $pesanan->status_pesanan }}
                </div>

                <div class="status-paid-badge" style="background:#fff3e0; color:#e65100; margin-left: 5px;">
                    Kasir: {{ $pesanan->pembayaran->status_pembayaran }}
                </div>
            </div>
            
            <div class="receipt-meta-grid">
                <div>Nama Pelanggan:</div>
                <div class="meta-val">{{ $pesanan->pelanggan->nama_pelanggan }}</div>
                <div>Jenis Layanan:</div>
                <div class="meta-val">{{ strtoupper($pesanan->pelanggan->jenis_layanan) }}</div>
                <div>Nomor Meja:</div>
                <div class="meta-val">{{ $pesanan->pelanggan->no_meja ?? '-' }}</div>
                <div>ID Transaksi:</div>
                <div class="meta-val">#AGB-{{ $pesanan->id_pesanan }}</div>
            </div>
            
            <div style="border-bottom: 1px dashed #ccc; padding-bottom: 12px; margin-bottom: 12px;">
                @foreach($details as $item)
                    <div class="receipt-item-line">
                        <div>
                            <div>{{ $item['nama'] }}</div>
                            <div style="color:gray; font-size:11px;">{{ $item['qty'] }} x Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>
                        </div>
                        <div style="font-weight:600;">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>
            
            <div class="receipt-grand-total">
                <span>Total Bayar</span>
                <span>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
            </div>
        </div>

        <button class="btn-refresh" onclick="window.location.reload()">
            <i class="fa-solid fa-arrows-rotate"></i> Cek Status Masakan Terbaru
        </button>
        <a href="{{ route('pelanggan.welcome') }}" class="btn-exit" onclick="return confirm('Apakah Anda ingin keluar?')">Selesai</a>
    </div>
</body>
</html>