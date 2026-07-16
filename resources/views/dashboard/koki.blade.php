<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Koki - Ayam Geprek Bossku</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>


<body class="bg-gray-50 min-h-screen">


    <div class="min-h-screen ">



        <!-- NAVBAR -->

        <nav class="bg-white border-b border-gray-200 shadow-sm">


            <div class="max-w-7xl mx-auto px-8 py-3 flex justify-between items-center">


                <div class="flex items-center gap-3">


                    <img
                        src="{{ asset('images/logo-bossku.png') }}"
                        class="w-16 h-16 object-contain">


                    <div>

                        <h1 class="text-2xl font-black text-red-600">

                            Ayam Geprek Bossku

                        </h1>


                        <p class="text-sm text-gray-500">

                            Kitchen Management System

                        </p>


                    </div>


                </div>




                <div class="flex items-center gap-6">


                    <div class="text-right">


                        <p class="font-bold text-gray-800 text-lg">

                            {{ session('nama_staff') }}

                        </p>


                        <p class="text-sm font-bold text-red-600">

                            HEAD CHEF

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

        <section class="max-w-7xl mx-auto px-8 pt-6 pb-5">


            <div class="flex flex-col md:flex-row justify-between gap-5">


                <div>


                    <h2 class="text-4xl font-black text-gray-900">

                        Kitchen Monitor

                    </h2>


                    <p class="text-gray-500 text-lg mt-2">

                        Pantau status pesanan dan proses masakan dapur

                    </p>


                </div>





                <div class="flex gap-4">


                    <div class="
bg-white
rounded-2xl
shadow-md
p-5
w-44
">


                        <p class="text-xs font-bold text-gray-400 uppercase">

                            Pesanan Aktif

                        </p>


                        <p class="text-3xl font-black text-red-600 mt-2">

                            {{ $pesananBaruKoki->count() }}

                        </p>


                    </div>



                    


                </div>



            </div>


        </section>







        <!-- BOARD -->

        <main class="
    max-w-7xl
    mx-auto
    px-8
    py-6
    grid
    grid-cols-1
    md:grid-cols-3
    gap-8
    justify-items-center
">



            <!-- =====================
PESANAN BARU
===================== -->


            <section class="w-full">


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
border-l-8
border-red-500
p-6
w-full
">



                    @if($pesananBaruKoki->count() > 0)



                    @foreach($pesananBaruKoki as $order)



                    <div class="mb-6">


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


                            <p class="text-sm text-gray-700 mb-2">

                                {{ $item->menu->name }}

                                x{{ $item->quantity }}

                            </p>


                            @endforeach



                        </div>




                        <form
                            action="{{ route('pesanan.mulaiMasak',$order->id) }}"
                            method="POST"
                            class="mt-5">


                            @csrf


                            <button
                                type="submit"
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

                                Mulai Masak

                            </button>


                        </form>



                    </div>



                    @endforeach



                    @else


                    <div class="
bg-red-50
rounded-xl
p-6
text-center
">

                        Belum ada pesanan masuk

                    </div>


                    @endif



                </div>


            </section>









            <!-- =====================
DIPROSES DAPUR
===================== -->


            <section class="w-full">


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
border-l-8
border-orange-500
p-6
w-full
">



                    @if($pesananMasak->count() > 0)



                    @foreach($pesananMasak as $order)



                    <div class="mb-6">


                        <p class="
text-orange-600
font-black
text-xl
">

                            #AGB-{{ $order->id }}

                        </p>



                        <div class="
bg-orange-50
rounded-xl
p-5
mt-4
">


                            <p class="font-bold">

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





                        <form
                            action="{{ route('pesanan.selesaiMasak',$order->id) }}"
                            method="POST"
                            class="mt-5">


                            @csrf


                            <button
                                type="submit"
                                class="
w-full
py-3
rounded-xl
bg-orange-500
text-white
font-bold
hover:bg-orange-600
transition
">

                                Selesai Masak

                            </button>


                        </form>



                    </div>




                    @endforeach



                    @else


                    <div class="
bg-orange-50
rounded-xl
p-6
text-center
">

                        Belum ada pesanan sedang dimasak

                    </div>



                    @endif



                </div>


            </section>









            <!-- =====================
SIAP DISAJIKAN
===================== -->


            <section class="w-full">


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
border-l-8
border-green-500
p-6
w-full
">



                    @if($pesananSiap->count() > 0)



                    @foreach($pesananSiap as $order)



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


                            <p class="font-bold">

                                {{ $order->customer->name }}

                            </p>


                            <p class="text-gray-500 text-sm">

                                Meja {{ $order->customer->table_number }}

                            </p>



                        </div>



                        @endforeach



                        @else


                        <div class="
bg-green-50
rounded-xl
p-6
text-center
">

                            Belum ada pesanan siap disajikan

                        </div>


                        @endif



                    </div>


            </section>




        </main>


    </div>


</body>

</html>