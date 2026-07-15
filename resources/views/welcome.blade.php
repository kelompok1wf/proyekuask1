<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Ayam Geprek Bossku
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="min-h-screen bg-[#fff8f5] overflow-x-hidden">


    <div class="min-h-screen flex flex-col">


        <!-- HERO -->

        <section class="flex-1">


            <div class="
            max-w-6xl
            mx-auto
            px-5
            pt-16
            pb-10
        ">


                <!-- LOGO -->

                <div class="flex justify-center mb-6">


                    <img
                        src="{{ asset('images/logo-bossku.png') }}"
                        class="
                    w-100
                    md:w-90
                    object-contain
                    drop-shadow-xl
                    "
                        alt="Ayam Geprek Bossku">


                </div>




                <!-- TITLE -->


                <div class="text-center">


                    <h1 class="
                    text-4xl
                    md:text-6xl
                    font-black
                    text-red-700
                ">

                        Ayam Geprek Bossku

                    </h1>



                    <p class="
                    mt-3
                    text-lg
                    md:text-xl
                    text-gray-600
                    italic
                ">

                        "Level Pedas! Gak Ada Mati-Nya!"

                    </p>


                </div>


            </div>






            <!-- ACCESS CARD -->


            <div class="
            max-w-6xl
            mx-auto
            px-5
            pb-12
        ">


                <div class="
                grid
                grid-cols-1
                md:grid-cols-2
                lg:grid-cols-3
                gap-7
            ">





                    <!-- PELANGGAN -->


                    <a href="{{ route('login') }}"
                        class="group">


                        <div class="
                        bg-white
                        rounded-3xl
                        shadow-xl
                        border
                        border-red-100
                        p-8
                        hover:-translate-y-2
                        hover:shadow-2xl
                        transition
                    ">



                            <h2 class="
                            text-2xl
                            font-black
                            text-gray-800
                            group-hover:text-red-600
                        ">

                                🍽️ Pelanggan

                            </h2>



                            <p class="
                            mt-4
                            text-gray-600
                        ">

                                Pesan makanan,
                                pilih menu favorit,
                                dan lakukan pemesanan.

                            </p>




                            <button
                                class="
                            mt-8
                            w-full
                            py-4
                            rounded-xl
                            bg-red-600
                            text-white
                            font-bold
                        ">

                                Mulai Pesan

                            </button>



                        </div>


                    </a>









                    <!-- PEMILIK -->


                    <a href="{{ route('login.pemilik') }}"
                        class="group">


                        <div class="
                        bg-white
                        rounded-3xl
                        shadow-xl
                        border
                        border-orange-100
                        p-8
                        hover:-translate-y-2
                        hover:shadow-2xl
                        transition
                    ">



                            <h2 class="
                            text-2xl
                            font-black
                            text-gray-800
                            group-hover:text-orange-600
                        ">

                                👨‍💼 Pemilik

                            </h2>




                            <p class="
                            mt-4
                            text-gray-600
                        ">

                                Mengelola staff,
                                memantau restoran,
                                dan laporan penjualan.

                            </p>




                            <button
                                class="
                            mt-8
                            w-full
                            py-4
                            rounded-xl
                            bg-orange-500
                            text-white
                            font-bold
                        ">

                                Login Pemilik

                            </button>



                        </div>


                    </a>









                    <!-- STAFF -->


                    <a href="{{ route('login.staff') }}"
                        class="group">


                        <div class="
                        bg-white
                        rounded-3xl
                        shadow-xl
                        border
                        border-yellow-100
                        p-8
                        hover:-translate-y-2
                        hover:shadow-2xl
                        transition
                    ">



                            <h2 class="
                            text-2xl
                            font-black
                            text-gray-800
                            group-hover:text-orange-600
                        ">

                                👨‍🍳 Staff

                            </h2>




                            <p class="
                            mt-4
                            text-gray-600
                        ">

                                Pelayan, koki,
                                dan kasir mengelola
                                operasional restoran.

                            </p>




                            <button
                                class="
                            mt-8
                            w-full
                            py-4
                            rounded-xl
                            bg-gradient-to-r
                            from-red-600
                            to-orange-500
                            text-white
                            font-bold
                        ">

                                Login Staff

                            </button>



                        </div>


                    </a>





                </div>


            </div>




        </section>






        <!-- FOOTER -->


        <footer class="
        py-5
        text-center
        text-gray-500
        text-sm
        bg-white
        border-t
    ">


            © 2026 Ayam Geprek Bossku - Sistem Manajemen Restoran Digital


        </footer>



    </div>



</body>

</html>