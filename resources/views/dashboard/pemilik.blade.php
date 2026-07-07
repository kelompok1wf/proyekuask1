<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemilik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">

        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                    <div>
                        <h1 class="text-4xl font-bold">Dashboard Pemilik</h1>
                        <p class="text-orange-100 mt-2">
                            Selamat datang, {{ session('nama_pemilik') }}
                        </p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-6 rounded-full shadow-lg transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-2 gap-6">

                <a href="{{ route('staff.index') }}"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-8 border-t-4 border-red-500">
                    <h2 class="text-2xl font-bold text-gray-800 mb-3">Kelola Staff</h2>
                    <p class="text-gray-600 mb-5">
                        Tambah, edit, hapus, dan lihat data Pelayan, Koki, serta Kasir.
                    </p>
                    <span class="inline-block bg-red-600 text-white font-bold py-2 px-5 rounded-lg">
                        Buka Kelola Staff
                    </span>
                </a>

                <a href="{{ route('laporan.penjualan') }}"
                    class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-8 border-t-4 border-orange-500">
                    <h2 class="text-2xl font-bold text-gray-800 mb-3">Lihat Laporan Penjualan</h2>
                    <p class="text-gray-600 mb-5">
                        Melihat ringkasan laporan penjualan restoran.
                    </p>
                    <span class="inline-block bg-orange-500 text-white font-bold py-2 px-5 rounded-lg">
                        Buka Laporan
                    </span>
                </a>

            </div>
        </div>

    </div>
</body>

</html>