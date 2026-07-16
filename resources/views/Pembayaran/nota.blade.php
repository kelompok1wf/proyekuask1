<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Ayam Geprek Bossku</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root { --primary: #d32f2f; --dark: #212121; --gray: #757575; --bg-light: #f8f9fa; --bg-container: #ffffff; }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Poppins', sans-serif; }
        body { background-color: var(--bg-light); display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .app-container { width: 100%; max-width: 450px; height: 100vh; background-color: var(--bg-container); position: relative; box-shadow: 0 0 40px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; padding:24px; overflow-y:auto; }
        @media (min-height: 700px) and (min-width: 480px) { .app-container { height: 850px; border-radius: 32px; border: 8px solid #2d2d2d; } }
        
        .receipt-paper { background: white; border: 1px solid #e0e0e0; border-radius: 12px; padding: 20px; position: relative; margin-bottom: 20px; flex:1; overflow-y:auto;}
        .receipt-header { text-align: center; border-bottom: 1px dashed #ccc; padding-bottom: 16px; margin-bottom: 16px; }
        .status-paid-badge { display: inline-block; margin-top: 8px; background: #e8f5e9; color: #2e7d32; padding: 4px 12px; border-radius: 12px; font-weight: 700; font-size: 11px; text-transform: uppercase; }
        
        .receipt-meta { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; font-size: 12px; border-bottom: 1px dashed #eee; padding-bottom: 16px; margin-bottom: 16px; }
        .meta-val { text-align: right; font-weight: 600; }
        
        .receipt-item-line { display: flex; justify-content: space-between; font-size: 13px; margin-bottom: 10px; }
        .btn-secondary { width: 100%; padding: 16px; border: none; background-color: #f5f5f5; color: var(--dark); border-radius: 16px; font-weight: 700; cursor: pointer; text-decoration: none; text-align: center; display: block; }
    </style>
</head>
<body>
    <div class="receipt-header">
        <div style="font-size: 18px; font-weight: 800; color: var(--primary);">AYAM GEPREK BOSSKU</div>
        
        <div style="margin-top: 8px;">
            <span style="background: #e3f2fd; color: #0d47a1; padding: 4px 12px; border-radius: 12px; font-weight: 700; font-size: 11px;">
                STATUS: {{ strtoupper($pesanan->status_koki) }}
            </span>
        </div>

        <div style="margin-top: 5px;">
            <span style="background: {{ $pesanan->pembayaran->status_pembayaran == 'Lunas' ? '#e8f5e9' : '#ffebee' }}; 
                        color: {{ $pesanan->pembayaran->status_pembayaran == 'Lunas' ? '#2e7d32' : '#c62828' }}; 
                        padding: 4px 12px; border-radius: 12px; font-weight: 700; font-size: 11px;">
                {{ strtoupper($pesanan->pembayaran->status_pembayaran) }}
            </span>
        </div>
    </div>

    <div style="text-align: center; margin-top: 15px;">
        <button onclick="window.location.reload();" class="btn-secondary" style="padding: 8px 16px; font-size: 12px; display: inline-flex; width: auto; gap: 5px;">
            <i class="fa-solid fa-arrow-rotate-right"></i> Perbarui Status Masakan
        </button>
    </div>
    <div class="app-container">
        <h2 style="font-size: 20px; font-weight: 800; margin-bottom: 16px; text-align: center; color: #2e7d32;">
            <i class="fa-solid fa-circle-check"></i> Pesanan Berhasil
        </h2>

        <div class="receipt-paper">
            <div class="receipt-header">
                <div style="font-size: 18px; font-weight: 800; color: var(--primary);">AYAM GEPREK BOSSKU</div>
                <div style="font-size: 11px; color: var(--gray);">Level Pedas! Gak Ada Mati-Nya!</div>
                <div class="status-paid-badge">{{ $pesanan->pembayaran->status_pembayaran }}</div>
            </div>

            <div class="receipt-meta">
                <div>Nama Pelanggan:</div><div class="meta-val">{{ $pesanan->pelangan->nama_pelanggan }}</div>
                <div>Jenis Layanan:</div><div class="meta-val">{{ strtoupper($pesanan->pelangan->jenis_layanan) }}</div>
                @if($pesanan->pelangan->no_meja)
                    <div>Nomor Meja:</div><div class="meta-val">Meja {{ $pesanan->pelangan->no_meja }}</div>
                @endif
                <div>Waktu Order:</div><div class="meta-val">{{ $pesanan->created_at->format('H:i') }} WIB</div>
                <div>ID Pesanan:</div><div class="meta-val">#AGB-{{ $pesanan->id_pesanan }}</div>
            </div>

            <div style="border-bottom: 1px dashed #ccc; padding-bottom: 12px; margin-bottom: 12px;">
                @foreach($details as $item)
                    <div class="receipt-item-line">
                        <div>
                            <div>{{ $item['nama'] }}</div>
                            <div style="color:var(--gray); font-size:12px;">{{ $item['qty'] }} x Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>
                        </div>
                        <div style="font-weight:600;">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</div>
                    </div>
                @endforeach
            </div>

            <div class="receipt-item-line" style="font-size: 16px; font-weight: 800; color: var(--primary);">
                <span>Total Bayar</span>
                <span>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
            </div>

            <div style="text-align: center; margin-top: 24px; font-size: 12px; color: var(--gray); font-style: italic;">
                Mohon tunggu ya Bossku, koki kami sedang meracik hidangan pedas pesanan Anda!
            </div>
        </div>

        <a href="{{ route('pelanggan.welcome') }}" class="btn-secondary">Selesai & Keluar <i class="fa-solid fa-rotate-left"></i></a>
    </div>
</body>
</html>