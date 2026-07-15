<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Geprek Bossku - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #fcfcfc;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .mobile-container {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            min-height: 100vh;
            padding: 40px 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .logo-area {
            text-align: center;
            margin-bottom: 35px;
        }
        .logo-circle {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #ff4e50, #f9d423);
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 8px 16px rgba(255, 78, 80, 0.2);
            position: relative;
        }
        .logo-circle i {
            font-size: 55px;
            color: white;
        }
        .logo-badge {
            position: absolute;
            bottom: -10px;
            background: #f9d423;
            color: #333;
            font-weight: 800;
            font-size: 11px;
            padding: 3px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 10; /* Menjaga badge tulisan Bossku tetap di paling depan */
        }
        .app-title {
            color: #c92c2c;
            font-weight: 800;
            font-size: 26px;
            margin-top: 20px;
            margin-bottom: 5px;
        }
        .app-subtitle {
            color: #777;
            font-size: 14px;
            font-weight: 500;
        }
        .form-label {
            font-weight: 700;
            font-size: 13px;
            color: #222;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
            border-radius: 14px 0 0 14px;
            color: #888;
            padding: 14px 18px;
        }
        .form-control {
            border-left: none;
            border-radius: 0 14px 14px 0;
            padding: 14px 18px;
            font-size: 15px;
            background-color: #f8f9fa;
        }
        .form-control::placeholder {
            color: #bbb;
        }
        .form-control:focus {
            background-color: #f8f9fa;
            border-color: #dee2e6;
            box-shadow: none;
        }
        .btn-order {
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
            margin-top: 20px;
        }
        .btn-order:hover {
            opacity: 0.95;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

<div class="mobile-container">
    <div class="logo-area">
    <div class="logo-container" style="display: inline-flex; justify-content: center; align-items: center; position: relative; margin-bottom: 15px;">
        
        <img src="{{ asset('img/logo.png') }}" alt="Logo Ayam Geprek Bossku" style="width: 300px; height: auto; display: block;">
        
    </div>
    <h1 class="app-title">Ayam Geprek Bossku</h1>
    <p class="app-subtitle">Level Pedas! Gak Ada Mati-Nya!</p>
</div>

    <form action="/login" method="POST">
        @csrf
        <div class="mb-4">
            <label class="form-label">Nama Anda</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama anda" required autocomplete="off">
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">Nomor Meja</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-chair"></i></span>
                <input type="text" name="table_number" class="form-control" placeholder="Contoh: 08" required autocomplete="off">
            </div>
        </div>

        <button type="submit" class="btn-order">
            Mulai Pesan Menu <i class="fa-solid fa-arrow-right-to-bracket ms-2"></i>
        </button>
    </form>
</div>

</body>
</html>