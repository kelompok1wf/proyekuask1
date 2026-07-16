<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan - Ayam Geprek Bossku</title>
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
            padding: 24px 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .btn-back {
            color: #c92c2c;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            margin-bottom: 20px;
            transition: all 0.2s;
        }
        .btn-back:hover {
            color: #ff4e50;
        }
        .page-title {
            font-weight: 800;
            font-size: 24px;
            color: #222;
            margin-bottom: 30px;
        }
        /* Item List Belanjaan */
        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding-bottom: 16px;
            margin-bottom: 16px;
            border-bottom: 1px solid #f1f1f1;
        }
        .item-name {
            font-weight: 700;
            font-size: 15px;
            color: #222;
            margin-bottom: 4px;
        }
        /* Desain badge level pedas di checkout */
        .badge-spicy {
            background-color: #ffebeb;
            color: #c92c2c;
            font-size: 11px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 6px;
            display: inline-block;
            margin-bottom: 6px;
            border: 1px solid #ffccd0;
        }
        .item-qty-price {
            font-size: 13px;
            color: #888;
        }
        .item-qty-highlight {
            color: #c92c2c;
            font-weight: 700;
        }
        .item-total-price {
            font-weight: 700;
            font-size: 15px;
            color: #222;
        }
        /* Kotak Rincian Biaya */
        .summary-card {
            background-color: #f8f9fa;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 24px;
            border: 1px solid #f3f3f3;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            font-size: 14px;
            color: #666;
        }
        .summary-row.total {
            margin-bottom: 0;
            padding-top: 12px;
            border-top: 1px dashed #ddd;
            font-size: 16px;
        }
        .total-label {
            font-weight: 800;
            color: #c92c2c;
        }
        .total-amount {
            font-weight: 800;
            color: #c92c2c;
        }
        /* Tombol Kirim */
        .btn-submit-order {
            background: linear-gradient(90deg, #ff4e50, #ff761b);
            border: none;
            border-radius: 16px;
            padding: 15px;
            font-weight: 700;
            font-size: 16px;
            color: white;
            box-shadow: 0 6px 15px rgba(255, 78, 80, 0.3);
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-submit-order:hover {
            opacity: 0.95;
        }
    </style>
</head>
<body>

<div class="mobile-container">
    <div>
        <!-- Tombol Kembali -->
        <a href="/menu" class="btn-back">
            <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Menu Utama
        </a>

        <!-- Judul Halaman -->
        <h2 class="page-title">Konfirmasi Pesanan</h2>

        <!-- Loop Item Keranjang -->
        <div class="order-list">
            @php $subtotal = 0; @endphp
            @forelse(session('cart', []) as $id => $details)
                @php $subtotal += $details['price'] * $details['quantity']; @endphp
                <div class="order-item">
                    <div>
                        <!-- Nama Menu -->
                        <div class="item-name">{{ $details['name'] }}</div>
                        
                        <!-- BARU: Kondisi pengecekan level pedas, muncul jika level di atas 0 -->
                        @if(isset($details['spicy_level']) && $details['spicy_level'] > 0)
                            <div class="badge-spicy">
                                <i class="fa-solid fa-pepper-hot text-danger"></i> Level {{ $details['spicy_level'] }}
                            </div>
                        @endif

                        <div class="item-qty-price">
                            <span class="item-qty-highlight">{{ $details['quantity'] }}x</span> @ Rp {{ number_format($details['price'], 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="item-total-price">
                        Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}
                    </div>
                </div>
            @empty
                <div class="text-center py-5 text-muted">Keranjang belanjaanmu kosong.</div>
            @endforelse
        </div>
    </div>

    <!-- Bagian Bawah: Ringkasan & Submit -->
    <div>
        <div class="summary-card">
            <div class="summary-row">
                <div>Subtotal Makanan</div>
                <div>Rp {{ number_format($subtotal, 0, ',', '.') }}</div>
            </div>
            <div class="summary-row">
                <div>Pajak Restoran (PB1 10%)</div>
                <div style="color: #888;">Rp 0 (GRATIS)</div>
            </div>
            <div class="summary-row total">
                <div class="total-label">Total Bersih</div>
                <div class="total-amount">Rp {{ number_format($subtotal, 0, ',', '.') }}</div>
            </div>
        </div>

        <!-- Form Kirim ke Backend untuk Proses Transaksi -->
        @if(count(session('cart', [])) > 0)
            <form action="/checkout/process" method="POST">
                @csrf
                <button type="submit" class="btn-submit-order">
                    Kirim Pesanan <i class="fa-solid fa-paper-plane ms-2"></i>
                </button>
            </form>
        @endif
    </div>
</div>

</body>
</html>