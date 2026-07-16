<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Menu Kuliner</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #d32f2f;
            --secondary: #ff9800;
            --dark: #212121;
            --gray: #757575;
            --radius: 16px;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Poppins', sans-serif; }
        body { background-color: #f3f4f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        
        .tablet-container { width: 100%; max-width: 768px; background: #ffffff; height: 90vh; border-radius: 28px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); display: flex; flex-direction: column; overflow: hidden; position: relative; }
        
        /* SISTEM INTERKONEKSI SCREEN (JS SWITCH) */
        .page-view { display: none; flex-direction: column; height: 100%; padding: 32px; overflow-y: auto; }
        .page-view.active { display: flex; }

        .top-navbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; border-bottom: 2px solid #f3f4f6; padding-bottom: 16px; }
        .top-navbar h2 { font-size: 20px; font-weight: 800; color: var(--dark); }
        .layanan-tag { background: var(--primary); color: white; padding: 8px 16px; border-radius: 30px; font-weight: 700; font-size: 13px; }

        .items-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; padding-bottom: 100px; }
        .menu-item-box { border: 1px solid #e5e7eb; border-radius: var(--radius); padding: 16px; display: flex; flex-direction: column; justify-content: space-between; background: white; }
        .title-item { font-size: 15px; font-weight: 700; color: var(--dark); }
        .desc-item { font-size: 11px; color: var(--gray); margin: 6px 0 12px; min-height: 33px; }
        .footer-item { display: flex; justify-content: space-between; align-items: center; }
        .price-item { font-size: 16px; font-weight: 800; color: var(--primary); }

        /* COUNTER CONTROLLER */
        .count-controls { display: flex; align-items: center; background: #f3f4f6; border-radius: 20px; padding: 4px; gap: 10px; }
        .btn-ctrl { width: 28px; height: 28px; border-radius: 50%; border: none; background: white; font-weight: 700; cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .btn-ctrl.plus-red { background: var(--primary); color: white; }
        .count-num-val { font-size: 14px; font-weight: 700; min-width: 20px; text-align: center; }

        /* SUMMARY ACTION BAR */
        .bottom-checkout-bar { position: absolute; bottom: 0; left: 0; width: 100%; background: white; padding: 20px 32px; border-top: 1px solid #e5e7eb; display: none; justify-content: space-between; align-items: center; border-radius: 20px 20px 0 0; box-shadow: 0 -8px 25px rgba(0,0,0,0.05); }
        .btn-pay-now { padding: 14px 28px; background: linear-gradient(135deg, var(--primary), var(--secondary)); border: none; border-radius: 12px; color: white; font-weight: 700; font-size: 15px; cursor: pointer; }

        /* BACK BAR DI KERANJANG */
        .btn-back-katalog { font-size: 15px; font-weight: 700; color: var(--primary); cursor: pointer; margin-bottom: 24px; display: inline-flex; align-items: center; gap: 8px; }
        .cart-row { display: flex; justify-content: space-between; align-items: center; padding: 16px 0; border-bottom: 1px solid #f3f4f6; }
        .invoice-card { background: #fafafa; border-radius: var(--radius); padding: 20px; margin-top: 30px; border: 1px dashed #ccc; }
        .invoice-row-line { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 14px; }
        .invoice-row-line.netto-price { border-top: 2px solid #e5e7eb; padding-top: 14px; font-size: 20px; font-weight: 800; color: var(--primary); }
    </style>
</head>
<body>

    <div class="tablet-container">
        
        <div id="screen-katalog" class="page-view active">
            <div class="top-navbar">
                <div>
                    <h2>Halo, {{ session('nama_pelanggan') }} 👋</h2>
                    <p style="font-size:12px; color:var(--gray);">Silakan masukkan pilihan hidangan lezat Anda</p>
                </div>
                <div class="layanan-tag">
                    <i class="fa-solid fa-circle-check"></i> {{ session('jenis_layanan') == 'dine-in' ? 'Meja ' . session('no_meja') : 'Take Away' }}
                </div>
            </div>

            <div class="items-grid">
                @foreach($menus as $menu)
                    <div class="menu-item-box">
                        <div>
                            <div class="title-item">{{ $menu['name'] }}</div>
                            <div class="desc-item">{{ $menu['desc'] }}</div>
                        </div>
                        <div class="footer-item">
                            <div class="price-item">Rp {{ number_format($menu['price'], 0, ',', '.') }}</div>
                            <div class="count-controls">
                                <button class="btn-ctrl" onclick="ubahItemBelanja({{ $menu['id'] }}, -1, {{ $menu['price'] }}, '{{ $menu['name'] }}')">-</button>
                                <span class="count-num-val" id="qty-screen-{{ $menu['id'] }}">0</span>
                                <button class="btn-ctrl plus-red" onclick="ubahItemBelanja({{ $menu['id'] }}, 1, {{ $menu['price'] }}, '{{ $menu['name'] }}')">+</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="bottom-checkout-bar" id="bar-katalog-summary">
                <div>
                    <div style="font-size: 13px; color: var(--gray);" id="summary-unit">0 Item Ditambahkan</div>
                    <div style="font-size: 22px; font-weight: 800; color: var(--dark);" id="summary-total">Rp 0</div>
                </div>
                <button class="btn-pay-now" onclick="tampilkanLayarKeranjang()">
                    Lihat Keranjang <i class="fa-solid fa-basket-shopping"></i>
                </button>
            </div>
        </div>

        <div id="screen-keranjang" class="page-view">
            <div class="btn-back-katalog" onclick="kembaliKeKatalogKatalog()">
                <i class="fa-solid fa-arrow-left-long"></i> Tambah Menu Lain (Kembali Belanja)
            </div>

            <h2 style="font-size: 24px; font-weight: 800; margin-bottom: 20px;">Daftar Keranjang Anda</h2>
            
            <div style="flex: 1; overflow-y: auto;" id="container-pembelian"></div>

            <div class="invoice-card">
                <div class="invoice-row-line">
                    <span>Subtotal Makanan</span>
                    <span id="label-subtotal">Rp 0</span>
                </div>
                <div class="invoice-row-line netto-price">
                    <span>Total Bayar</span>
                    <span id="label-total">Rp 0</span>
                </div>
            </div>

            <form action="{{ route('pesanan.checkout') }}" method="POST" style="margin-top: 20px;">
                @csrf
                <input type="hidden" name="cart_data" id="json-input-data">
                <button type="submit" class="btn-pay-now" style="width: 100%; text-align: center; padding: 18px;">
                    Kirim Pesanan ke Dapur <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>

    </div>

    <script>
        let dataKeranjang = {};

        function ubahItemBelanja(id, delta, harga, nama) {
            let qtyLama = dataKeranjang[id] ? dataKeranjang[id].qty : 0;
            let qtyBaru = qtyLama + delta;

            if(qtyBaru <= 0) {
                delete dataKeranjang[id];
            } else {
                dataKeranjang[id] = { nama: nama, qty: qtyBaru, harga: harga };
            }

            // Update display katalog
            const targetSpan = document.getElementById('qty-screen-' + id);
            if(targetSpan) targetSpan.innerText = dataKeranjang[id] ? qtyBaru : 0;

            hitungKalkulasiTotalKatalog();
        }

        function hitungKalkulasiTotalKatalog() {
            let itemUnit = 0;
            let nominalUang = 0;

            Object.keys(dataKeranjang).forEach(id => {
                itemUnit += dataKeranjang[id].qty;
                nominalUang += (dataKeranjang[id].qty * dataKeranjang[id].harga);
            });

            const barSum = document.getElementById('bar-katalog-summary');
            if(itemUnit > 0) {
                barSum.style.display = 'flex';
                document.getElementById('summary-unit').innerText = itemUnit + ' Porsi Hidangan Terpilih';
                document.getElementById('summary-total').innerText = 'Rp ' + nominalUang.toLocaleString('id-ID');
            } else {
                barSum.style.display = 'none';
            }
        }

        function tampilkanLayarKeranjang() {
            const wadah = document.getElementById('container-pembelian');
            let totalAkhir = 0;
            let barisHtml = '';

            Object.keys(dataKeranjang).forEach(id => {
                let item = dataKeranjang[id];
                let subTotal = item.qty * item.harga;
                totalAkhir += subTotal;

                barisHtml += `
                    <div class="cart-row">
                        <div>
                            <div style="font-weight:700; font-size:15px;">${item.nama}</div>
                            <div style="font-size:12px; color:var(--gray);">${item.qty} Porsi x Rp ${item.harga.toLocaleString('id-ID')}</div>
                        </div>
                        <div style="display:flex; align-items:center; gap:16px;">
                            <div style="font-weight:800; font-size:16px; color:var(--primary);">Rp ${subTotal.toLocaleString('id-ID')}</div>
                            
                            <button onclick="kurangPorsiKeranjang(${id})" class="btn-ctrl" style="color:red; border:1px solid red;">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </div>
                    </div>
                `;
            });

            wadah.innerHTML = barisHtml;
            document.getElementById('label-subtotal').innerText = 'Rp ' + totalAkhir.toLocaleString('id-ID');
            document.getElementById('label-total').innerText = 'Rp ' + totalAkhir.toLocaleString('id-ID');

            // Packing data JSON
            let payload = {};
            Object.keys(dataKeranjang).forEach(id => {
                payload[id] = dataKeranjang[id].qty;
            });
            document.getElementById('json-input-data').value = JSON.stringify(payload);

            // Ganti Screen View
            document.getElementById('screen-katalog').classList.remove('active');
            document.getElementById('screen-keranjang').classList.add('active');
        }

        function kurangPorsiKeranjang(id) {
            ubahItemBelanja(id, -1, dataKeranjang[id].harga, dataKeranjang[id].nama);
            
            if(Object.keys(dataKeranjang).length > 0) {
                tampilkanLayarKeranjang();
            } else {
                kembaliKeKatalogKatalog();
            }
        }

        function kembaliKeKatalogKatalog() {
            document.getElementById('screen-keranjang').classList.remove('active');
            document.getElementById('screen-katalog').classList.add('active');
        }
    </script>
</body>
</html>