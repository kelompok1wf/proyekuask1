<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemilik - Ayam Geprek Bossku</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-gray-50 min-h-screen">


    <div class="min-h-screen">


        <!-- HEADER -->
        <header class="bg-white shadow-md">

            <div class="px-10 py-4 flex items-center justify-between">


                <!-- BRAND -->
                <div class="flex items-center gap-1">

                    <img src="{{ asset('images/logo-bossku.png') }}"
                        class="w-30 h-15 object-contain"
                        alt="Logo">

                    <div>

                        <h1 class="text-2xl font-black text-red-600">
                            Ayam Geprek Bossku
                        </h1>

                        <p class="text-gray-500">
                            Management System
                        </p>

                    </div>

                </div>



                <!-- USER -->
                <div class="flex items-center gap-5">


                    <div class="text-right">

                        <p class="text-xl font-black text-gray-800">
                            {{ session('nama_pemilik') }}
                        </p>

                        <p class="text-red-600 font-bold">
                            PEMILIK
                        </p>

                    </div>



                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button
                            class="bg-red-50 text-red-600 font-bold px-7 py-3 rounded-2xl hover:bg-red-600 hover:text-white transition shadow-sm">

                            Logout

                        </button>

                    </form>


                </div>


            </div>

        </header>





        <!-- CONTENT -->
        <main class="px-10 py-8">



            <!-- TITLE + STATISTIC -->

            <div class="flex justify-between items-start mb-10">


                <div>

                    <h2 class="text-5xl font-black text-gray-900">
                        Business Monitor
                    </h2>


                    <p class="text-gray-500 text-lg mt-2">
                        Kelola operasional restoran dan pantau performa bisnis
                    </p>


                </div>

                <!-- STAT CARD -->

                <div class="flex gap-5"> </div>


            </div>

            <!-- MENU CARD -->

            <div class="grid md:grid-cols-2 gap-8">

                <!-- KELOLA STAFF -->

                <a href="{{ route('staff.index') }}"
                    class="group">


                    <div class="bg-white rounded-3xl shadow-md overflow-hidden hover:shadow-xl transition">


                        <div class="h-2 bg-red-500"></div>



                        <div class="p-8">


                            <div class="flex justify-between items-start">


                                <div class="flex items-center gap-4">


                                    <div class="w-16 h-16 rounded-xl bg-red-100 flex items-center justify-center">

                                        <svg class="w-9 h-9 text-red-600"
                                            fill="currentColor"
                                            viewBox="0 0 24 24">

                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />

                                        </svg>


                                    </div>



                                    <h3 class="text-3xl font-black text-gray-800">
                                        Kelola Staff
                                    </h3>


                                </div>


                                <span class="text-red-500 text-3xl">
                                    ›
                                </span>


                            </div>





                            <p class="text-gray-500 text-lg mt-8 leading-relaxed">

                                Tambah, edit, hapus, dan lihat data Pelayan,
                                Koki, serta Kasir. Kelola seluruh staff restoran
                                dengan mudah.

                            </p>





                            <div class="mt-8">

                                <span class="inline-block bg-red-600 text-white font-bold px-7 py-3 rounded-xl">

                                    Buka Kelola Staff

                                </span>


                            </div>


                        </div>


                    </div>


                </a>

                <!-- LAPORAN -->

                <a href="{{ route('laporan.penjualan') }}"
                    class="group">


                    <div class="bg-white rounded-3xl shadow-md overflow-hidden hover:shadow-xl transition">


                        <div class="h-2 bg-orange-500"></div>



                        <div class="p-8">


                            <div class="flex justify-between items-start">


                                <div class="flex items-center gap-4">


                                    <div class="w-16 h-16 rounded-xl bg-orange-100 flex items-center justify-center">


                                        <svg class="w-9 h-9 text-orange-600"
                                            fill="currentColor"
                                            viewBox="0 0 24 24">


                                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" />


                                        </svg>


                                    </div>



                                    <h3 class="text-3xl font-black text-gray-800">

                                        Laporan Penjualan

                                    </h3>


                                </div>


                                <span class="text-orange-500 text-3xl">
                                    ›
                                </span>


                            </div>






                            <p class="text-gray-500 text-lg mt-8 leading-relaxed">

                                Lihat ringkasan laporan penjualan restoran.
                                Analisa performa bisnis dengan data yang akurat.

                            </p>





                            <div class="mt-8">

                                <span class="inline-block bg-orange-500 text-white font-bold px-7 py-3 rounded-xl">

                                    Buka Laporan

                                </span>


                            </div>


                        </div>


                    </div>


                </a>




            </div>

            <!-- INFORMASI -->

            <div class="mt-10 bg-white rounded-3xl shadow-md border-t-4 border-yellow-400 p-8">


                <div class="flex gap-5">


                    <div class="w-14 h-14 rounded-xl bg-yellow-100 flex items-center justify-center">


                        <svg class="w-8 h-8 text-yellow-600"
                            fill="currentColor"
                            viewBox="0 0 24 24">

                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm0-4h-2V7h2v8z" />

                        </svg>


                    </div>



                    <div>

                        <h3 class="text-xl font-black text-gray-800 mb-2">

                            Informasi Penting

                        </h3>



                        <p class="text-gray-600 text-lg">

                            Dashboard ini adalah pusat kontrol untuk mengelola
                            seluruh operasional restoran. Pastikan data staff
                            selalu ter-update dan laporan penjualan di-monitor
                            secara berkala untuk memastikan bisnis berjalan optimal.

                        </p>


                    </div>


                </div>


            </div>





        </main>


    </div>


</body>

</html>