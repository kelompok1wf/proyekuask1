<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelayan - Ayam Geprek Bossku</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-gray-50 min-h-screen">


    <div class="min-h-screen">


        <!-- NAVBAR -->

        <nav class="bg-white border-b border-gray-200 shadow-sm">

            <div class="max-w-7xl mx-auto px-8 py-3 flex justify-between items-center">


                <!-- LOGO -->

                <div class="flex items-center gap-1">


                    <img
                        src="{{ asset('images/logo-bossku.png') }}"
                        alt="Logo Bossku"
                        class="w-30 h-15 object-contain">


                    <div>

                        <h1 class="
                    text-2xl
                    font-black
                    text-red-600
                    ">
                            Ayam Geprek Bossku
                        </h1>


                        <p class="
                    text-sm
                    text-gray-500
                    ">
                            Service Management System
                        </p>


                    </div>


                </div>




                <!-- STAFF PROFILE -->


                <div class="flex items-center gap-6">


                    <div class="text-right">

                        <p class="
                    text-lg
                    font-bold
                    text-gray-800
                    ">

                            {{ session('nama_staff') }}

                        </p>


                        <p class="
                    text-sm
                    font-bold
                    text-red-600
                    ">
                            PELAYAN
                        </p>


                    </div>



                    <form action="{{ route('logout') }}" method="POST">

                        @csrf


                        <button
                            class="
                        bg-red-50
                        text-red-600
                        px-6
                        py-3
                        rounded-xl
                        font-bold
                        shadow-sm
                        hover:bg-red-600
                        hover:text-white
                        transition
                        ">

                            Logout

                        </button>


                    </form>



                </div>


            </div>


        </nav>





        <!-- HEADER -->


        <section class="max-w-7xl mx-auto px-8 pt-4 pb-4">


            <div class="flex justify-between items-end">


                <div>


                    <h2 class="
                text-4xl
                font-black
                text-gray-900
                ">

                        Service Monitor

                    </h2>


                    <p class="
                text-gray-500
                text-lg
                mt-2
                ">

                        Pantau status pesanan pelanggan dan proses pelayanan

                    </p>


                </div>






                <!-- STATISTIC -->


                <div class="flex gap-5">



                    <div class="
                bg-white
                border
                border-gray-200
                rounded-2xl
                shadow-md
                p-5
                min-w-[180px]
                ">


                        <p class="
                    text-xs
                    font-bold
                    text-gray-400
                    uppercase
                    ">

                            Pesanan Diproses

                        </p>


                        <p class="
                    text-3xl
                    font-black
                    text-red-600
                    mt-2
                    ">

                            0

                        </p>


                    </div>





                    <div class="
                bg-white
                border
                border-gray-200
                rounded-2xl
                shadow-md
                p-5
                min-w-[180px]
                ">


                        <p class="
                    text-xs
                    font-bold
                    text-gray-400
                    uppercase
                    ">

                            Siap Diantar

                        </p>


                        <p class="
                    text-3xl
                    font-black
                    text-green-600
                    mt-2
                    ">

                            0

                        </p>


                    </div>



                </div>



            </div>



        </section>







        <!-- ORDER BOARD -->


        <main class="
    max-w-7xl
    mx-auto
    px-8
    grid
    md:grid-cols-3
    gap-8
    ">





            <!-- PESANAN BARU -->


            <section>


                <div class="flex items-center gap-3 mb-5">


                    <span class="
                w-3
                h-3
                rounded-full
                bg-red-500
                "></span>


                    <h3 class="
                text-xl
                font-black
                text-gray-800
                uppercase
                ">

                        Pesanan Baru

                    </h3>


                </div>




                <div class="
            bg-white
            rounded-3xl
            shadow-md
            hover:shadow-xl
            transition
            border-l-8
            border-red-500
            p-6
            ">


                    <p class="
                text-red-600
                font-black
                text-xl
                ">
                        -
                    </p>


                    <div class="
                bg-red-50
                rounded-xl
                p-6
                text-center
                mt-5
                ">


                        <p class="text-gray-500">

                            Belum ada pesanan masuk

                        </p>


                    </div>




                    <button
                        class="
                    w-full
                    mt-6
                    py-3
                    rounded-xl
                    bg-red-600
                    text-white
                    font-bold
                    hover:bg-red-700
                    transition
                    ">

                        Konfirmasi Pesanan

                    </button>



                </div>



            </section>







            <!-- DIPROSES DAPUR -->


            <section>


                <div class="flex items-center gap-3 mb-5">


                    <span class="
                w-3
                h-3
                rounded-full
                bg-orange-500
                "></span>


                    <h3 class="
                text-xl
                font-black
                text-gray-800
                uppercase
                ">

                        Diproses Dapur

                    </h3>


                </div>





                <div class="
            bg-white
            rounded-3xl
            shadow-md
            hover:shadow-xl
            transition
            border-l-8
            border-orange-500
            p-6
            ">


                    <p class="
                text-orange-600
                font-black
                text-xl
                ">
                        -
                    </p>




                    <div class="
                bg-orange-50
                rounded-xl
                p-6
                text-center
                mt-5
                ">


                        <p class="text-gray-500">

                            Pesanan sedang dibuat oleh koki

                        </p>


                    </div>



                    <div class="
                mt-6
                bg-orange-100
                text-orange-600
                rounded-xl
                py-3
                text-center
                font-bold
                ">

                        Menunggu Dapur

                    </div>



                </div>



            </section>








            <!-- SIAP DIANTAR -->


            <section>


                <div class="flex items-center gap-3 mb-5">


                    <span class="
                w-3
                h-3
                rounded-full
                bg-green-500
                "></span>


                    <h3 class="
                text-xl
                font-black
                text-gray-800
                uppercase
                ">

                        Siap Disajikan

                    </h3>


                </div>






                <div class="
            bg-white
            rounded-3xl
            shadow-md
            hover:shadow-xl
            transition
            border-l-8
            border-green-500
            p-6
            ">



                    <p class="
                text-green-600
                font-black
                text-xl
                ">
                        -
                    </p>



                    <div class="
                bg-green-50
                rounded-xl
                p-6
                text-center
                mt-5
                ">


                        <p class="text-gray-500">

                            Belum ada makanan siap disajikan

                        </p>


                    </div>





                    <button
                        class="
                    w-full
                    mt-6
                    py-3
                    rounded-xl
                    bg-green-600
                    text-white
                    font-bold
                    hover:bg-green-700
                    transition
                    ">


                        Antarkan Pesanan


                    </button>




                </div>



            </section>





        </main>



    </div>



</body>

</html>