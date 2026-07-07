<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">

        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                    <div>
                        <h1 class="text-4xl font-bold">Laporan Penjualan</h1>
                        <p class="text-orange-100 mt-2">
                            Ringkasan laporan penjualan restoran
                        </p>
                    </div>

                    <a href="{{ route('dashboard.pemilik') }}"
                        class="bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-6 rounded-full shadow-lg transition text-center">
                        ← Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                    Data laporan belum tersedia
                </h2>

                <p class="text-gray-600">
                    Halaman ini disiapkan untuk menampilkan laporan penjualan.
                    Data laporan nanti dapat dihubungkan setelah modul pesanan dan pembayaran dari anggota kelompok lain selesai digabungkan.
                </p>
            </div>
        </div>

    </div>
</body>

</html>