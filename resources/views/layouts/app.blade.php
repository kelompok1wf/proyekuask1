<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Bossku - Sistem Pemesanan Mandiri</title>
    <link href="https://fonts.googleapis.com/css2 family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #d32f2f;
            --primary-dark: #b71c1c;
            --secondary: #ff9800;
            --accent: #ffeb3b;
            --dark: #212121;
            --gray: #757575;
            --light: #f8f9fa;
            --white: #ffffff;
            --radius: 12px;
            --shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Poppins', sans-serif; }
        body { background-color: var(--light); color: var(--dark); min-height: 100vh; display: flex; flex-direction: column; }
        
        .navbar { background: var(--primary); color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100; box-shadow: var(--shadow); }
        .navbar .brand { font-weight: 700; font-size: 1.2rem; display: flex; align-items: center; gap: 8px; }
        .navbar .info { display: flex; align-items: center; gap: 15px; font-size: 0.9rem; }
        .logout-btn { background: rgba(255,255,255,0.2); border: none; padding: 6px 12px; border-radius: 6px; color: white; cursor: pointer; font-weight: 600; transition: 0.3s; }
        .logout-btn:hover { background: var(--accent); color: var(--dark); }

        .container { flex: 1; width: 100%; max-width: 1200px; margin: 0 auto; padding: 20px; }
        .card { background: var(--white); padding: 25px; border-radius: var(--radius); box-shadow: var(--shadow); }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 20px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.2s; text-decoration: none; font-size: 0.95rem; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-secondary { background: var(--secondary); color: white; }
        
        /* Flexbox/Grid Utuh Responsif */
        @media (max-width: 768px) {
            .navbar .info { font-size: 0.8rem; gap: 8px; }
            .container { padding: 12px; }
        }
    </style>
    @yield('styles')
</head>
<body>

    @if(session()->has('customer'))
    <nav class="navbar">
        <div class="brand"><i class="fa-solid fa-utensils"></i> Ayam Geprek Bossku</div>
        <div class="info">
            <span><i class="fa-solid fa-user"></i> {{ session('customer')['name'] }} (Meja {{ session('customer')['table_number'] }})</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn"><i class="fa-solid fa-sign-out-alt"></i> Keluar</button>
            </form>
        </div>
    </nav>
    @endif

    <div class="container">
        @yield('content')
    </div>

</body>
</html>