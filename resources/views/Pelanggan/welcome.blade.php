<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Bossku - Selamat Datang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #d32f2f;
            --primary-dark: #b71c1c;     
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
        .screen { display: flex; flex-direction: column; width: 100%; height: 100%; padding: 24px; overflow-y: auto; justify-content: center; align-items: center; }
        .brand-logo { width: 125px; height: 125px; background: linear-gradient(135deg, #ff1744, #ff9100); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-bottom: 20px; box-shadow: 0 10px 25px rgba(211, 47, 47, 0.2); border: 4px solid white; position: relative; }
        .brand-logo i { font-size: 55px; color: white; }
        .brand-badge { position: absolute; bottom: -6px; background: var(--accent); color: var(--dark); font-size: 11px; font-weight: 800; padding: 3px 12px; border-radius: 20px; text-transform: uppercase; }
        .app-title { font-size: 26px; font-weight: 800; color: var(--primary); margin-bottom: 4px; }
        .app-tagline { font-size: 13px; color: var(--gray); margin-bottom: 36px; }
        .form-box { width: 100%; text-align: left; }
        .input-group { margin-bottom: 16px; }
        .input-group label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 8px; color: var(--dark); text-transform: uppercase; }
        .input-wrapper { position: relative; display: flex; align-items: center; width: 100%; }
        .input-wrapper i { position: absolute; left: 16px; color: var(--gray); font-size: 18px; }
        .input-wrapper input, .input-wrapper select { width: 100%; padding: 16px 16px 16px 48px; border: 2px solid #e0e0e0; border-radius: var(--radius); font-size: 15px; outline: none; background-color: #fafafa; transition: var(--transition); appearance: none; }
        .input-wrapper input:focus, .input-wrapper select:focus { border-color: var(--primary); background-color: #ffffff; }
        .btn { width: 100%; padding: 16px; border: none; border-radius: var(--radius); font-size: 16px; font-weight: 700; cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 10px; background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; box-shadow: 0 6px 16px rgba(213, 47, 47, 0.25); }
    </style>
</head>
<body>
    <div class="app-container">
        <div class="screen">
            <div class="brand-logo">
                <i class="fa-solid fa-fire-burner"></i>
                <div class="brand-badge">Bossku</div>
            </div>
            <h1 class="app-title">Ayam Geprek Bossku</h1>
            <p class="app-tagline">Level Pedas! Gak Ada Mati-Nya!</p>
            
            <form action="{{ route('pelanggan.store') }}" method="POST" class="form-box">
                @csrf
                <div class="input-group">
                    <label>Nama Anda</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" name="nama_pelanggan" placeholder="Masukkan nama panggilan..." required autocomplete="off">
                    </div>
                </div>

                <div class="input-group">
                    <label>Jenis Layanan</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-utensils"></i>
                        <select name="jenis_layanan" id="jenis_layanan" onchange="toggleMejaField()" required>
                            <option value="dine-in">Dine In (Makan di Sini)</option>
                            <option value="take-away">Take Away (Bungkus)</option>
                        </select>
                    </div>
                </div>
                
                <div class="input-group" id="meja-container">
                    <label>Nomor Meja</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-chair"></i>
                        <input type="number" name="no_meja" id="no_meja" placeholder="Contoh: 08" min="1" max="50" required>
                    </div>
                </div>
                
                <button type="submit" class="btn">
                    Mulai Pesan Menu <i class="fa-solid fa-right-to-bracket"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        function toggleMejaField() {
            const layanan = document.getElementById('jenis_layanan').value;
            const containerMeja = document.getElementById('meja-container');
            const inputMeja = document.getElementById('no_meja');
            
            if (layanan === 'take-away') {
                containerMeja.style.display = 'none';
                inputMeja.removeAttribute('required');
                inputMeja.value = '';
            } else {
                containerMeja.style.display = 'block';
                inputMeja.setAttribute('required', 'required');
            }
        }
    </script>
</body>
</html>