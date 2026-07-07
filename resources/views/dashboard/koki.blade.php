<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Koki</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gray-50">


    <div class="min-h-screen">


        <!-- Header -->

        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-lg">


            <div class="max-w-7xl mx-auto px-6 py-8">


                <div class="flex justify-between items-center">


                    <div>

                        <h1 class="text-4xl font-bold">
                            Dashboard Koki
                        </h1>


                        <p class="mt-2 text-orange-100">

                            Selamat datang,
                            {{ session('nama_staff') }}

                        </p>


                    </div>



                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button
                            class="bg-white text-red-500 font-bold px-6 py-3 rounded-lg">

                            Keluar

                        </button>

                    </form>



                </div>


            </div>


        </div>




        <!-- Content -->


        <div class="max-w-7xl mx-auto px-6 py-12">


            <div class="bg-white rounded-xl shadow p-8">


                <h2 class="text-2xl font-bold text-gray-800 mb-4">

                    Pesanan Dapur

                </h2>



                <p class="text-gray-600 mb-6">

                    Kelola pesanan yang harus diproses oleh bagian dapur.

                </p>



                <div class="border rounded-lg p-6 text-center">


                    <p class="text-gray-500">

                        Belum ada pesanan masuk.

                    </p>


                </div>



            </div>


        </div>



    </div>


</body>

</html>