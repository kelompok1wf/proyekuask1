<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pemilik - Ayam Geprek Bossku</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gradient-to-br from-red-50 to-orange-50 min-h-screen">


    <div class="min-h-screen flex items-center justify-center px-4 py-8">


        <div class="w-full max-w-md">


            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">


                <!-- HEADER -->

                <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-8 py-10">


                    <div class="flex justify-center mb-4">


                        <img
                            src="{{ asset('images/logo-bossku.png') }}"
                            alt="Ayam Geprek Bossku"
                            class="
                        w-100
                        h-28
                        object-contain
                        drop-shadow-lg
                        ">


                    </div>



                    <h1 class="text-3xl font-bold text-center">

                        Login Pemilik

                    </h1>



                    <p class="text-orange-100 text-center mt-2 text-sm">

                        Akses dashboard manajemen restoran

                    </p>


                </div>





                <!-- FORM CONTENT -->


                <div class="p-8">



                    @if(session('error'))

                    <div class="
                bg-red-50
                border-l-4
                border-red-500
                text-red-700
                px-4
                py-3
                rounded-lg
                mb-6
                ">

                        {{ session('error') }}

                    </div>

                    @endif





                    @if(session('success'))

                    <div class="
                bg-green-50
                border-l-4
                border-green-500
                text-green-700
                px-4
                py-3
                rounded-lg
                mb-6
                ">

                        {{ session('success') }}

                    </div>

                    @endif






                    <form action="{{ route('login.pemilik.proses') }}" method="POST" class="space-y-5">


                        @csrf




                        <!-- USERNAME -->


                        <div>


                            <label class="
                        block
                        text-gray-700
                        font-semibold
                        mb-2
                        text-sm
                        ">

                                Nama Pengguna

                            </label>




                            <input
                                type="text"
                                name="username"
                                required
                                placeholder="Masukkan nama pengguna"
                                class="
                            w-full
                            px-4
                            py-3
                            border-2
                            border-gray-200
                            rounded-lg
                            focus:outline-none
                            focus:border-red-500
                            transition
                            ">
                        </div>

                        <!-- PASSWORD -->

                        <div>

                            <label class="
                        block
                        text-gray-700
                        font-semibold
                        mb-2
                        text-sm
                        ">

                                Password

                            </label>




                            <input
                                type="password"
                                name="password"
                                required
                                placeholder="Masukkan password"
                                class="
                            w-full
                            px-4
                            py-3
                            border-2
                            border-gray-200
                            rounded-lg
                            focus:outline-none
                            focus:border-red-500
                            transition
                            ">



                        </div>







                        <!-- BUTTON -->


                        <button
                            type="submit"
                            class="
                        w-full
                        bg-gradient-to-r
                        from-red-500
                        to-orange-500
                        hover:from-red-600
                        hover:to-orange-600
                        text-white
                        font-bold
                        py-3
                        rounded-lg
                        transition
                        transform
                        hover:scale-105
                        shadow-lg
                        mt-6
                        ">

                            Login

                        </button>



                    </form>







                    <!-- BACK -->


                    <div class="
                text-center
                mt-6
                pt-6
                border-t
                border-gray-200
                ">



                        <a href="{{ url('/') }}"
                            class="
                    inline-flex
                    items-center
                    text-gray-600
                    hover:text-red-600
                    transition
                    font-medium
                    ">


                            ← Kembali ke Pilihan Login


                        </a>



                    </div>



                </div>



            </div>






            <div class="
        text-center
        mt-8
        text-gray-600
        text-sm
        ">


                © 2026 Ayam Geprek Bossku


            </div>




        </div>


    </div>


</body>


</html>