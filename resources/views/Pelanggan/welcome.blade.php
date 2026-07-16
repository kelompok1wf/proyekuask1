<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Bossku - Pilih Layanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #d32f2f;
            --secondary: #ff9800;
            --dark: #212121;             
            --gray: #757575;             
            --radius: 20px;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Poppins', sans-serif; }
        body { background-color: #f3f4f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        
        /* Container khusus seukuran layar tablet */
        .tablet-box { width: 100%; max-width: 768px; background: #ffffff; min-height: 80vh; border-radius: 28px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); display: flex; flex-direction: column; justify-content: center; padding: 50px; text-align: center; }
        
        .brand-section { margin-bottom: 50px; }
        .brand-icon { width: 110px; height: 110px; background: linear-gradient(135deg, #ff1744, #ff9100); border-radius: 50%; display: inline-flex; justify-content: center; align-items: center; font-size: 50px; color: white; margin-bottom: 20px; box-shadow: 0 8px 20px rgba(211,47,47,0.2); }
        .main-title { font-size: 34px; font-weight: 800; color: var(--primary); }
        .tagline { font-size: 16px; color: var(--gray); margin-top: 4px; }
        
        .cards-wrapper { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 20px; }
        .action-card { border: 3px solid #e5e7eb; border-radius: var(--radius); padding: 40px 24px; cursor: pointer; transition: all 0.2s ease; background-color: #fafafa; text-decoration: none; display: block; }
        .action-card i { font-size: 55px; color: var(--gray); margin-bottom: 20px; transition: transform 0.2s ease; }
        .action-card h3 { font-size: 20px; font-weight: 700; color: var(--dark); }
        .action-card p { font-size: 13px; color: var(--gray); margin-top: 6px; }
        
        /* Efek Hover Sentuhan */
        .action-card:hover { border-color: var(--primary); background-color: #fef2f2; transform: translateY(-4px); }
        .action-card:hover i { color: var(--primary); transform: scale(1.1); }
    </style>
</head>
<body>

    <div class="tablet-box">
        <div class="brand-section">
            <div class="brand-icon"><i class="fa-solid fa-fire-burner"></i></div>
            <h1 class="main-title">Ayam Geprek Bossku</h1>
            <p class="tagline">Silakan ketuk jenis layanan pemesanan Anda</p>
        </div>

        <div class="cards-wrapper">
            <a href="{{ route('pelanggan.register', ['layanan' => 'dine-in']) }}" class="action-card">
                <i class="fa-solid fa-utensils"></i>
                <h3>Dine In</h3>
                <p>Makan langsung di meja restoran</p>
            </a>

            <a href="{{ route('pelanggan.register', ['layanan' => 'take-away']) }}" class="action-card">
                <i class="fa-solid fa-bag-shopping"></i>
                <h3>Take Away</h3>
                <p>Bungkus bawa pulang</p>
            </a>
        </div>
    </div>

</body>
</html>