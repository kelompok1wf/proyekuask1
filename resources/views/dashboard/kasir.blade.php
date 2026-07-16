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


                <div class="flex items-center gap-3">


                    <img
                        src="{{ asset('images/logo-bossku.png') }}"
                        class="w-16 h-16 object-contain">


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





                <div class="flex items-center gap-6">


                    <div class="text-right">


                        <p class="text-lg font-bold text-gray-800">

                            {{ session('nama_staff') }}

                        </p>


                        <p class="text-sm font-bold text-red-600">

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








        <!-- BOARD -->


        <main class="
max-w-7xl
mx-auto
px-8
grid
grid-cols-1
md:grid-cols-3
gap-8
">





            <!-- ==========================
MENUNGGU PEMBAYARAN
========================== -->


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
uppercase
">

                        Menunggu Pembayaran

                    </h3>


                </div>





                <div class="
bg-white
rounded-3xl
shadow-md
border-l-8
border-red-500
p-6
">



                    @if($menungguBayar->count() > 0)



                    @foreach($menungguBayar as $order)



                    <div class="mb-8">


                        <p class="
text-red-600
font-black
text-xl
">

                            #AGB-{{ $order->id }}

                        </p>




                        <div class="
bg-red-50
rounded-xl
p-5
mt-4
">


                            <p class="font-bold text-gray-800">

                                {{ $order->customer->name }}

                            </p>


                            <p class="text-gray-500 text-sm">

                                Meja {{ $order->customer->table_number }}

                            </p>



                            <hr class="my-3">



                            @foreach($order->items as $item)


                            <p class="text-sm mb-2">

                                {{ $item->menu->name }}

                                x{{ $item->quantity }}

                            </p>


                            @endforeach



                        </div>





                        <a href="{{ route('pembayaran',$order->id) }}"
                            class="
block
w-full
mt-6
py-3
rounded-xl
bg-red-600
text-white
text-center
font-bold
hover:bg-red-700
transition
">

                            Proses Pembayaran

                        </a>



                    </div>



                    @endforeach



                    @else



                    <div class="
bg-red-50
rounded-xl
p-6
text-center
">

                        Belum ada transaksi

                    </div>



                    @endif



                </div>


            </section>

            <!-- ==========================
PEMBAYARAN DIPROSES
========================== -->


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
uppercase
">

                        Pembayaran Diproses

                    </h3>


                </div>





                <div class="
bg-white
rounded-3xl
shadow-md
border-l-8
border-orange-500
p-6
">



                    <div class="
bg-orange-50
rounded-xl
p-6
text-center
">

                        <p class="text-gray-500">

                            Transaksi sedang diproses

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

                        Menunggu Konfirmasi

                    </div>




                </div>


            </section>









            <!-- ==========================
PEMBAYARAN SELESAI
========================== -->


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
uppercase
">

                        Pembayaran Selesai

                    </h3>


                </div>





                <div class="
bg-white
rounded-3xl
shadow-md
border-l-8
border-green-500
p-6
">





                    @if($pembayaranSelesai->count() > 0)



                    @foreach($pembayaranSelesai as $order)



                    <div class="mb-6">


                        <p class="
text-green-600
font-black
text-xl
">

                            #AGB-{{ $order->id }}

                        </p>




                        <div class="
bg-green-50
rounded-xl
p-5
mt-4
">


                            <p class="font-bold text-gray-800">

                                {{ $order->customer->name }}

                            </p>



                            <p class="text-gray-500 text-sm">

                                Meja {{ $order->customer->table_number }}

                            </p>



                            @if(isset($order->payment_method))


                            <p class="
text-green-600
font-bold
text-sm
mt-3
">

                                Metode:
                                {{ $order->payment_method }}

                            </p>


                            @endif



                        </div>



                    </div>



                    @endforeach



                    @else



                    <div class="
bg-green-50
rounded-xl
p-6
text-center
">

                        Belum ada pembayaran selesai

                    </div>



                    @endif




                </div>



            </section>







        </main>



    </div>



</body>


</html>