<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir - Ayam Geprek Bossku</title>

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





                <!-- PROFILE -->

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
                            KASIR
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






        <!-- TITLE -->

        <section class="max-w-7xl mx-auto px-8 pt-8 pb-5">


            <h2 class="
text-4xl
font-black
text-gray-900
">

                Cashier Monitor

            </h2>


            <p class="
text-gray-500
text-lg
mt-2
">

                Pantau transaksi pelanggan dan proses pembayaran

            </p>


        </section>









        <!-- CONTENT -->

        <main class="
max-w-7xl
mx-auto
px-8
grid
md:grid-cols-3
gap-8
">





            <!-- MENUNGGU PEMBAYARAN -->

            <section>


                <div class="
flex
items-center
gap-3
mb-5
">


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

                        MENUNGGU PEMBAYARAN

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
min-h-[280px]
flex
flex-col
justify-between
">


                    <div>

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


                            <p class="
text-gray-500
">

                                Belum ada transaksi

                            </p>


                        </div>

                    </div>




                    <button
                        class="
w-full
py-3
rounded-xl
bg-red-600
text-white
font-bold
hover:bg-red-700
transition
">

                        Proses Pembayaran

                    </button>



                </div>


            </section>









            <!-- PEMBAYARAN DIPROSES -->


            <section>


                <div class="
flex
items-center
gap-3
mb-5
">


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

                        PEMBAYARAN DIPROSES

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
min-h-[280px]
flex
flex-col
justify-between
">


                    <div>


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


                            <p class="
text-gray-500
">

                                Transaksi sedang diproses

                            </p>


                        </div>



                    </div>





                    <button
                        class="
w-full
py-3
rounded-xl
bg-orange-100
text-orange-600
font-bold
">

                        Menunggu Konfirmasi

                    </button>




                </div>


            </section>









            <!-- PEMBAYARAN SELESAI -->


            <section>


                <div class="
flex
items-center
gap-3
mb-5
">


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

                        PEMBAYARAN SELESAI

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
min-h-[280px]
flex
flex-col
justify-between
">


                    <div>


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


                            <p class="
text-gray-500
">

                                Belum ada pembayaran selesai

                            </p>


                        </div>


                    </div>




                </div>


            </section>





        </main>


    </div>


</body>

</html>