<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelayan</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50">

<div class="min-h-screen">

    <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white p-8">
        <h1 class="text-4xl font-bold">
            Dashboard Pelayan
        </h1>

        <p class="mt-2">
            Selamat datang, {{ session('nama_staff') }}
        </p>

        <form action="{{ route('logout') }}" method="POST" class="mt-5">
            @csrf
            <button 
            class="bg-white text-red-600 px-5 py-2 rounded-lg font-bold">
                Keluar
            </button>
        </form>

    </div>


    <div class="max-w-7xl mx-auto p-10">

        <div class="bg-white rounded-lg shadow p-8">

            <h2 class="text-2xl font-bold mb-3">
                Pesanan Pelanggan
            </h2>

            <p class="text-gray-600">
                Halaman ini digunakan pelayan untuk membuat dan melihat pesanan pelanggan.
            </p>


            <div class="mt-6 p-5 bg-gray-100 rounded-lg">
                Belum ada pesanan baru.
            </div>

        </div>

    </div>

</div>

</body>

</html>