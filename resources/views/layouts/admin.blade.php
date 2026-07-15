<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard - Ayam Geprek Bossku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            background-color: #fcfbf7; 
            font-family: 'Poppins', sans-serif; 
        }
        /* Sidebar Diubah Menjadi Warna Krem Lembut nan Mewah */
        .sidebar { 
            min-height: 100vh; 
            background-color: #f5f0e1; 
            box-shadow: 2px 0 15px rgba(0,0,0,0.03);
            border-right: 1px solid #e8dfc7;
        }
        .sidebar .nav-link { 
            color: #5d4037; 
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 20px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover {
            color: #c92c2c;
            background: rgba(201, 44, 44, 0.05);
            border-radius: 12px;
        }
        .sidebar .nav-link.active { 
            background: linear-gradient(90deg, #ff4e50, #ff761b); 
            color: white; 
            border-radius: 14px; 
            box-shadow: 0 4px 12px rgba(255, 78, 80, 0.2);
        }
        .card-metric { 
            border: none; 
            border-radius: 16px; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.02); 
            background: #ffffff;
            padding: 24px;
        }
        .bg-bossku-gradient { 
            background: linear-gradient(90deg, #ff4e50, #ff761b); 
            color: white; 
            box-shadow: 0 6px 15px rgba(255, 78, 80, 0.25);
        }
        .logo-badge-admin {
            background: #c92c2c;
            color: #ffffff;
            font-weight: 800;
            font-size: 11px;
            padding: 3px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            display: inline-block;
        }
        .table-responsive {
            border-radius: 14px;
            overflow: hidden;
        }
        @media print {
            .sidebar { display: none !important; }
            main { width: 100% !important; margin: 0 !important; padding: 0 !important; }
            .btn, .nav-pills { display: none !important; }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-4">
            <div class="text-center my-3">
                <h4 class="fw-bold mb-1" style="color: #c92c2c;">Bossku</h4>
                <span class="logo-badge-admin">Owner Panel</span>
            </div>
            <hr style="color: #5d4037; opacity: 0.15;" class="my-4">
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fa-solid fa-chart-pie me-2"></i> Dashboard</a>
                </li>
            </ul>
        </nav>

        <!-- Konten Utama -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5 py-5">
            @yield('content')
        </main>
    </div>
</div>
@yield('scripts')
</body>
</html>