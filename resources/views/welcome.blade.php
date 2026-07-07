<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Restoran</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-gray-50">


<div class="min-h-screen flex items-center justify-center px-4">


    <div class="bg-white rounded-2xl shadow-xl p-10 w-full max-w-md text-center">


        <h1 class="text-4xl font-bold text-gray-800 mb-3">
            Sistem Restoran
        </h1>


        <p class="text-gray-500 mb-8">
            Silakan pilih jenis login
        </p>



        <div class="space-y-4">


            <a href="{{ route('login') }}"
                class="block bg-gradient-to-r from-red-500 to-orange-500 
                text-white font-bold py-4 rounded-xl 
                hover:scale-105 transition">

                Login Pemilik

            </a>




            <a href="{{ route('login.staff') }}"
                class="block bg-yellow-400 hover:bg-yellow-500
                text-gray-800 font-bold py-4 rounded-xl
                hover:scale-105 transition">

                Login Staff

            </a>


        </div>


    </div>


</div>


</body>

</html>