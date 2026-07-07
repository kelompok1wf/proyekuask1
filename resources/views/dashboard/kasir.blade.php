<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50">

    <div class="min-h-screen">

        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white p-8">

            <h1 class="text-4xl font-bold">
                Dashboard Kasir
            </h1>

            <p>
                Selamat datang, {{ session('nama_staff') }}
            </p>


            <form action="{{ route('logout') }}" method="POST" class="mt-5">
                @csrf

                <button class="bg-white text-red-600 px-5 py-2 rounded-lg font-bold">
                    Keluar
                </button>

            </form>


        </div>


        <div class="max-w-7xl mx-auto p-10">

            <div class="bg-white rounded-lg shadow p-8">

                <h2 class="text-2xl font-bold">
                    Pembayaran
                </h2>


                <p class="mt-3">
                    Halaman kasir untuk melihat pesanan selesai dan melakukan pembayaran.
                </p>


                <div class="mt-6 bg-gray-100 p-5 rounded-lg">
                    Belum ada transaksi.
                </div>


            </div>

        </div>


    </div>

</body>

</html>