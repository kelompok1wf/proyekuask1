<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - Ayam Geprek Bossku</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gray-50 min-h-screen">


    <div class="min-h-screen">


        <!-- HEADER -->
        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-lg">


            <div class="px-12 py-10">


                <div class="flex justify-between items-center">


                    <div>

                        <h1 class="text-4xl font-bold">
                            Laporan Penjualan
                        </h1>


                        <p class="text-orange-100 mt-2 text-lg">
                            Ringkasan laporan penjualan restoran
                        </p>


                        <p class="text-orange-100 text-sm mt-1">
                            Pantau performa bisnis berdasarkan transaksi penjualan
                        </p>


                    </div>



                    <a href="{{ route('dashboard.pemilik') }}"
                        class="bg-white text-red-600 font-bold px-8 py-3 rounded-full shadow-md hover:bg-gray-100 transition">

                        Kembali

                    </a>



                </div>


            </div>


        </div>

        <!-- CONTENT -->

        <div class="px-12 py-10">

            <!-- FILTER -->

            <div class="bg-white rounded-2xl shadow-md p-7 mb-8">


                <h2 class="text-xl font-bold text-gray-800 mb-5">

                    Filter Laporan

                </h2>



                <div class="flex items-center gap-5">


                    <div>


                        <label class="block text-gray-500 text-sm mb-2">
                            Pilih Periode
                        </label>


                        <input
                            type="month"
                            class="border border-gray-300 rounded-lg px-5 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">


                    </div>



                    <button
                        class="mt-6 bg-red-500 hover:bg-red-600 text-white font-bold px-8 py-3 rounded-lg shadow-md transition">


                        Tampilkan Laporan


                    </button>


                </div>



            </div>

            <!-- SUMMARY -->

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">



                <!-- Pendapatan -->

                <div class="bg-white rounded-2xl shadow-md p-6 border-t-4 border-red-500">


                    <p class="text-gray-500">
                        Total Pendapatan
                    </p>


                    <h3 class="text-3xl font-bold text-red-600 mt-3">
                        Rp -
                    </h3>


                </div>






                <!-- Transaksi -->

                <div class="bg-white rounded-2xl shadow-md p-6 border-t-4 border-orange-500">


                    <p class="text-gray-500">
                        Total Transaksi
                    </p>


                    <h3 class="text-3xl font-bold text-orange-600 mt-3">
                        -
                    </h3>


                </div>







                <!-- Menu -->

                <div class="bg-white rounded-2xl shadow-md p-6 border-t-4 border-yellow-400">


                    <p class="text-gray-500">
                        Menu Terjual
                    </p>


                    <h3 class="text-3xl font-bold text-yellow-600 mt-3">
                        -
                    </h3>


                </div>







                <!-- Rata-rata -->

                <div class="bg-white rounded-2xl shadow-md p-6 border-t-4 border-green-500">


                    <p class="text-gray-500">
                        Rata-rata Transaksi
                    </p>


                    <h3 class="text-3xl font-bold text-green-600 mt-3">
                        Rp -
                    </h3>


                </div>




            </div>

            <!-- EMPTY DATA -->

            <div class="bg-white rounded-2xl shadow-md p-12 text-center">



                <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">


                    <svg class="w-10 h-10 text-yellow-600"
                        fill="currentColor"
                        viewBox="0 0 24 24">


                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />


                    </svg>


                </div>





                <h2 class="text-3xl font-bold text-gray-800 mb-4">

                    Data Laporan Belum Tersedia

                </h2>




                <p class="text-gray-600 text-lg max-w-3xl mx-auto">


                    Data laporan penjualan akan muncul setelah modul pesanan
                    dan pembayaran berhasil terhubung ke dalam sistem.


                </p>





            </div>






        </div>



    </div>



</body>


</html>