<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama - Ayam Geprek Bossku</title>
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
            padding: 24px 20px 100px 20px; /* Padding bawah extra untuk sticky cart */
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            position: relative;
        }
        .header-area {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .header-title {
            font-weight: 800;
            font-size: 24px;
            color: #222;
            margin: 0;
        }
        .welcome-text {
            color: #777;
            font-size: 14px;
            margin-top: 5px;
        }
        .badge-meja {
            background-color: #f99500;
            color: white;
            font-weight: 700;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(249, 149, 0, 0.2);
        }
        .section-title {
            font-weight: 700;
            font-size: 16px;
            color: #222;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .section-title::before {
            content: "";
            display: inline-block;
            width: 4px;
            height: 18px;
            background-color: #c92c2c;
            border-radius: 2px;
            margin-right: 8px;
        }
        /* Card Menu Gaya Horisontal */
        .menu-card {
            display: flex;
            background: #ffffff;
            border: 1px solid #f3f3f3;
            border-radius: 18px;
            padding: 14px;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.01);
            align-items: center;
        }
        .menu-img-wrapper {
            width: 85px;
            height: 85px;
            background-color: #ffe8cc;
            border-radius: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 36px;
            margin-right: 14px;
            flex-shrink: 0;
        }
        .menu-info {
            flex-grow: 1;
        }
        .menu-name {
            font-weight: 700;
            font-size: 15px;
            color: #222;
            margin-bottom: 4px;
            line-height: 1.3;
        }
        .menu-desc {
            font-size: 11px;
            color: #888;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .menu-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu-price {
            font-weight: 800;
            font-size: 15px;
            color: #c92c2c;
        }
        /* Tombol Kuantitas */
        .qty-counter {
            display: flex;
            align-items: center;
            background-color: #f5f5f5;
            border-radius: 20px;
            padding: 2px;
        }
        .btn-qty {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            font-weight: 700;
            transition: all 0.2s;
        }
        .btn-minus {
            background-color: transparent;
            color: #555;
        }
        .btn-plus {
            background-color: #c92c2c;
            color: white;
            box-shadow: 0 2px 6px rgba(201, 44, 44, 0.3);
        }
        .qty-number {
            font-weight: 700;
            font-size: 13px;
            color: #222;
            min-width: 24px;
            text-align: center;
        }
        /* Sticky Bottom Bar untuk Lihat Keranjang */
        .sticky-cart-bar {
            position: fixed;
            bottom: 0;
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-top: 1px solid #f1f1f1;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 24px 24px 0 0;
            box-shadow: 0 -6px 20px rgba(0,0,0,0.04);
            z-index: 999;
        }
        .cart-info-text {
            font-size: 12px;
            color: #777;
            margin-bottom: 2px;
        }
        .cart-total-price {
            font-weight: 800;
            font-size: 18px;
            color: #222;
        }
        .btn-view-cart {
            background: linear-gradient(90deg, #ff4e50, #ff761b);
            border: none;
            border-radius: 16px;
            padding: 12px 24px;
            font-weight: 700;
            font-size: 14px;
            color: white;
            box-shadow: 0 4px 12px rgba(255, 78, 80, 0.3);
            display: flex;
            align-items: center;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="mobile-container">
    <!-- Header Area -->
    <div class="header-area">
        <div>
            <div style="font-size: 20px; margin-bottom: 4px;">🔥</div>
            <h1 class="header-title">Menu Utama</h1>
            <div class="welcome-text">Selamat Datang, <strong>{{ session('customer')['name'] ?? 'Pelanggan' }}</strong>!</div>
        </div>
        <div class="badge-meja">
            <i class="fa-solid fa-location-dot me-1"></i> Meja {{ session('customer')['table_number'] ?? '00' }}
        </div>
    </div>

    <!-- Section Title -->
    <div class="section-title">Hidangan Spesial</div>

    <!-- List Menu Makanan -->
    <div class="menu-list">
        @forelse($menus as $menu)
            <div class="menu-card">
                <div class="menu-img-wrapper">
                    <!-- Icon otomatis berubah berdasarkan kategori menu -->
                    @if(Str::lower($menu->category) == 'minuman')
                        <i class="fa-solid fa-glass-water" style="color: #17a2b8;"></i>
                    @elseif(Str::lower($menu->category) == 'paket')
                        <i class="fa-solid fa-box" style="color: #ffc107;"></i>
                    @else
                        🍗
                    @endif
                </div>
                <div class="menu-info">
                    <div class="menu-name">{{ $menu->name }}</div>
                    <div class="menu-desc">{{ $menu->description }}</div>
                    <div class="menu-meta">
                        <div class="menu-price">Rp {{ number_format($menu->price, 0, ',', '.') }}</div>
                        
                        <!-- Form Tambah/Kurang Kuantitas langsung integrasi backend -->
                        <div class="qty-counter">
                            <form action="/cart/update/{{ $menu->id }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="action" value="decrease">
                                <button type="submit" class="btn-qty btn-minus">-</button>
                            </form>
                            
                            <span class="qty-number">
                                {{ session('cart')[$menu->id]['quantity'] ?? 0 }}
                            </span>
                            
                            <form action="/cart/update/{{ $menu->id }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="action" value="increase">
                                <button type="submit" class="btn-qty btn-plus">+</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5 text-muted">Belum ada menu di database.</div>
        @endforelse
    </div>

    <!-- Sticky Bottom Cart (Otomatis Menghitung Total Harga & Item dari Session) -->
    @php
        $totalItems = 0;
        $totalPrice = 0;
        if(session('cart')) {
            foreach(session('cart') as $item) {
                $totalItems += $item['quantity'];
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }
    @endphp

    <div class="sticky-cart-bar">
        <div>
            <div class="cart-info-text">{{ $totalItems }} Menu Terpilih</div>
            <div class="cart-total-price">Rp {{ number_format($totalPrice, 0, ',', '.') }}</div>
        </div>
        <a href="/checkout" class="btn-view-cart">
            Lihat Keranjang <i class="fa-solid fa-basket-shopping ms-2"></i>
        </a>
    </div>
</div>

</body>
</html>