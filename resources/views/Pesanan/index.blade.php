<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama - Ayam Geprek Bossku</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #d32f2f;
            --secondary: #ff9800;
            --accent: #ffeb3b;
            --dark: #212121;             
            --gray: #757575;             
            --bg-light: #f8f9fa;         
            --bg-container: #ffffff;     
            --radius: 16px;
            --shadow: 0 8px 24px rgba(211, 47, 47, 0.06);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Poppins', sans-serif; }
        body { background-color: var(--bg-light); display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .app-container { width: 100%; max-width: 450px; height: 100vh; background-color: var(--bg-container); position: relative; box-shadow: 0 0 40px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; overflow: hidden; }
        @media (min-height: 700px) and (min-width: 480px) { .app-container { height: 850px; border-radius: 32px; border: 8px solid #2d2d2d; } }
        .screen { display: none; flex-direction: column; width: 100%; height: 100%; padding: 24px; overflow-y: auto; background: var(--bg-container); }
        .screen.active { display: flex; }
        .menu-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .header-title-box { display: flex; align-items: center; gap: 10px; }
        .header-title-box .mini-fire { width: 36px; height: 36px; background: var(--primary); border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; }
        .table-badge { background-color: var(--secondary); color: white; padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: 700; display: flex; align-items: center; gap: 6px; }
        .user-greeting { font-size: 14px; color: var(--gray); margin-bottom: 20px; }
        .section-headline { font-size: 18px; font-weight: 700; margin-bottom: 16px; position: relative; padding-left: 12px; }
        .section-headline::before { content: ''; position: absolute; left: 0; top: 4px; width: 4px; height: 18px; background-color: var(--primary); border-radius: 2px; }
        .menu-scroll-area { flex: 1; overflow-y: auto; padding-bottom: 95px; }
        .menu-card { background: white; border-radius: var(--radius); padding: 14px; margin-bottom: 16px; display: flex; gap: 16px; border: 1px solid #f0f0f0; box-shadow: var(--shadow); }
        .menu-avatar { width: 90px; height: 90px; border-radius: 12px; background: linear-gradient(135deg, #ffe0b2, #ffcc80); display: flex; justify-content: center; align-items: center; font-size: 40px; flex-shrink: 0; }
        .menu-info { flex: 1; display: flex; flex-direction: column; justify-content: space-between; }
        .menu-name { font-size: 15px; font-weight: 700; color: var(--dark); }
        .menu-desc { font-size: 11px; color: var(--gray); margin: 4px 0 8px; }
        .menu-action-row { display: flex; justify-content: space-between; align-items: center; }
        .menu-price { font-size: 16px; font-weight: 800; color: var(--primary); }
        .counter-box { display: flex; align-items: center; background-color: #f5f5f5; padding: 4px; border-radius: 30px; gap: 12px; border: 1px solid #e5e5e5; }
        .counter-btn { width: 28px; height: 28px; border-radius: 50%; border: none; background-color: white; color: var(--dark); font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; }
        .counter-btn.plus-theme { background-color: var(--primary); color: white; }
        .counter-value { font-size: 14px; font-weight: 700; min-width: 16px; text-align: center; }
        .fixed-cart-bar { position: absolute; bottom: 0; left: 0; width: 100%; background: white; padding: 16px 24px; box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.08); border-radius: 24px 24px 0 0; display: none; justify-content: space-between; align-items: center; z-index: 99; }
        .cart-bar-details { display: flex; flex-direction: column; }
        .cart-bar-label { font-size: 12px; color: var(--gray); }
        .cart-bar-price { font-size: 18px; font-weight: 800; }
        .btn-go-cart { width: auto; padding: 12px 24px; font-size: 14px; border-radius: 12px; background: linear-gradient(135deg, var(--primary), var(--secondary)); border: none; color: white; font-weight: 700; cursor: pointer; }
        
        /* CSS Screen 3: Keranjang */
        .back-nav { display: inline-flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; color: var(--primary); cursor: pointer; margin-bottom: 20px; }
        .cart-items-wrapper { flex: 1; overflow-y: auto; }
        .row-cart-item { display: flex; justify-content: space-between; align-items: center; padding: 16px 0; border-bottom: 1px solid #f0f0f0; }
        .cart-item-meta { display: flex; flex-direction: column; }
        .cart-item-title { font-size: 14px; font-weight: 600; }
        .cart-item-sub { font-size: 12px; color: var(--gray); }
        .cart-item-subtotal { font-size: 15px; font-weight: 700; }
        .bill-invoice-box { background-color: #fafafa; border-radius: var(--radius); padding: 18px; border: 1px solid #eee; margin: 20px 0; }
        .invoice-line-row { display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 13px; color: var(--gray); }
        .invoice-line-row.final-amount { border-top: 1px dashed #ccc; padding-top: 14px; margin-bottom: 0; font-size: 18px; font-weight: 800; color: var(--primary); }
        .btn-submit-order { width: 100%; padding: 16px; border: none; border-radius: var(--radius); font-size: 16px; font-weight: 700; cursor: pointer; color: white; background: linear-gradient(135deg, var(--primary), var(--secondary)); }
    </style>
</head>
<body>
    <div class="app-container">
        
        <div id="screen-menu" class="screen active">
            <div class="menu-header">
                <div class="header-brand">
                    <div class="header-title-box">
                        <div class="mini-fire"><i class="fa-solid fa-fire"></i></div>
                        <h2>Menu Utama</h2>
                    </div>
                </div>
                <div class="table-badge">
                    <i class="fa-solid fa-location-dot"></i> 
                    {{ session('jenis_layanan') == 'dine-in' ? 'Meja ' . session('no_meja') : 'Take Away' }}
                </div>
            </div>

            <div class="user-greeting">
                Selamat Datang, <strong>{{ session('nama_pelanggan') }}</strong>!
            </div>

            <div class="section-headline">Hidangan Spesial</div>

            <div class="menu-scroll-area">
                @foreach($menus as $menu)
                    <div class="menu-card">
                        <div class="menu-avatar">🍗</div>
                        <div class="menu-info">
                            <div>
                                <div class="menu-name">{{ $menu['name'] }}</div>
                                <div class="menu-desc">{{ $menu['desc'] }}</div>
                            </div>
                            <div class="menu-action-row">
                                <div class="menu-price">Rp {{ number_format($menu['price'], 0, ',', '.') }}</div>
                                <div class="counter-box">
                                    <button class="counter-btn" onclick="ubahJumlahItem({{ $menu['id'] }}, -1, {{ $menu['price'] }}, '{{ $menu['name'] }}')">-</button>
                                    <span class="counter-value" id="val-qty-{{ $menu['id'] }}">0</span>
                                    <button class="counter-btn plus-theme" onclick="ubahJumlahItem({{ $menu['id'] }}, 1, {{ $menu['price'] }}, '{{ $menu['name'] }}')">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="fixed-cart-bar" id="box-floating-bar">
                <div class="cart-bar-details">
                    <span class="cart-bar-label" id="lbl-bar-qty">0 Menu Terpilih</span>
                    <span class="cart-bar-price" id="lbl-bar-total">Rp 0</span>
                </div>
                <button class="btn-go-cart" onclick="bukaHalamanKeranjang()">
                    Lihat Keranjang <i class="fa-solid fa-basket-shopping"></i>
                </button>
            </div>
        </div>

        <div id="screen-cart" class="screen">
            <div class="back-nav" onclick="kembaliKeMenuUtama()">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Menu Utama (Nambah Menu)
            </div>
            
            <h2 style="font-size: 20px; font-weight: 800; margin-bottom: 16px;">Konfirmasi Pesanan</h2>

            <div class="cart-items-wrapper" id="box-item-keranjang"></div>

            <div class="bill-invoice-box">
                <div class="invoice-line-row">
                    <span>Subtotal Makanan</span>
                    <span id="lbl-invoice-subtotal">Rp 0</span>
                </div>
                <div class="invoice-line-row">
                    <span>Pajak Restoran (PB1 10%)</span>
                    <span>Rp 0 (GRATIS)</span>
                </div>
                <div class="invoice-line-row final-amount">
                    <span>Total Bersih</span>
                    <span id="lbl-invoice-grandtotal">Rp 0</span>
                </div>
            </div>

            <form action="{{ route('pesanan.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="cart_data" id="cart-json-input">
                <button type="submit" class="btn-submit-order">
                    Kirim Pesanan ke Dapur <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>

    </div>

    <script>
        // State keranjang lokal di browser
        let dataKeranjang = {}; 

        function ubahJumlahItem(id, delta, harga, nama) {
            let qtySkarang = dataKeranjang[id] ? dataKeranjang[id].qty : 0;
            let qtyBaru = qtySkarang + delta;

            if (qtyBaru <= 0) {
                delete dataKeranjang[id];
            } else {
                dataKeranjang[id] = { name: nama, qty: qtyBaru, price: harga };
            }

            // Update angka display di katalog
            const spanQty = document.getElementById('val-qty-' + id);
            if (spanQty) {
                spanQty.innerText = dataKeranjang[id] ? qtyBaru : 0;
            }

            hitungKalkulasiTotal();
        }

        function hitungKalkulasiTotal() {
            let totalUnit = 0;
            let totalHarga = 0;

            Object.keys(dataKeranjang).forEach(id => {
                totalUnit += dataKeranjang[id].qty;
                totalHarga += dataKeranjang[id].price * dataKeranjang[id].qty;
            });

            const barBawah = document.getElementById('box-floating-bar');
            if (totalUnit > 0) {
                barBawah.style.display = 'flex';
                document.getElementById('lbl-bar-qty').innerText = `${totalUnit} Menu Terpilih`;
                document.getElementById('lbl-bar-total').innerText = `Rp ${totalHarga.toLocaleString('id-ID')}`;
            } else {
                barBawah.style.display = 'none';
            }
        }

        function bukaHalamanKeranjang() {
            const wadahList = document.getElementById('box-item-keranjang');
            let akumulasiUang = 0;
            let barisHtml = '';

            Object.keys(dataKeranjang).forEach(id => {
                const item = dataKeranjang[id];
                const subtotalItem = item.price * item.qty;
                akumulasiUang += subtotalItem;

                barisHtml += `
                    <div class="row-cart-item">
                        <div class="cart-item-meta">
                            <span class="cart-item-title">${item.name}</span>
                            <span class="cart-item-sub"><strong>${item.qty}x</strong> @ Rp ${item.price.toLocaleString('id-ID')}</span>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div class="cart-item-subtotal">Rp ${subtotalItem.toLocaleString('id-ID')}</div>
                            <button onclick="hapusSatuItem(${id})" class="counter-btn" style="color:red; border-color:red;">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                `;
            });

            wadahList.innerHTML = barisHtml;
            document.getElementById('lbl-invoice-subtotal').innerText = `Rp ${akumulasiUang.toLocaleString('id-ID')}`;
            document.getElementById('lbl-invoice-grandtotal').innerText = `Rp ${akumulasiUang.toLocaleString('id-ID')}`;
            
            // Masukkan data ke form tersembunyi
            let simplifiedJson = {};
            Object.keys(dataKeranjang).forEach(id => {
                simplifiedJson[id] = dataKeranjang[id].qty;
            });
            document.getElementById('cart-json-input').value = JSON.stringify(simplifiedJson);

            // Navigasi ke Layar Keranjang
            document.getElementById('screen-menu').classList.remove('active');
            document.getElementById('screen-cart').classList.add('active');
        }

        function hapusSatuItem(id) {
            // Mengurangi atau menghapus item sepenuhnya
            ubahJumlahItem(id, -1, dataKeranjang[id].price, dataKeranjang[id].name);
            
            // Render ulang keranjang jika masih berada di screen keranjang
            if (Object.keys(dataKeranjang).length > 0) {
                bukaHalamanKeranjang();
            } else {
                kembaliKeMenuUtama();
            }
        }

        function kembaliKeMenuUtama() {
            document.getElementById('screen-cart').classList.remove('active');
            document.getElementById('screen-menu').classList.add('active');
        }
    </script>
</body>
</html>