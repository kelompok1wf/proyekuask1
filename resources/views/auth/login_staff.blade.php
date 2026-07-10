<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Staff - Ayam Geprek Bossku</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-gradient-to-br from-orange-50 to-yellow-50 min-h-screen">


    <div class="min-h-screen flex items-center justify-center px-4 py-8">


        <div class="w-full max-w-md">


            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">


                <!-- Header -->

                <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-8 py-10">


                    <div class="flex justify-center mb-6">

                        <img
                            src="{{ asset('images/logo-bossku.png') }}"
                            alt="Ayam Geprek Bossku"
                            class="w-100 h-28 object-contain drop-shadow-lg">

                    </div>



                    <h1 class="text-3xl font-bold text-center">
                        Login Staff
                    </h1>


                    <p class="text-orange-100 text-center mt-2 text-sm">
                        Pelayan, Koki, dan Kasir
                    </p>


                </div>



                <!-- Form -->


                <div class="p-8">


                    @if(session('error'))

                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-6">

                        {{ session('error') }}

                    </div>

                    @endif




                    <form action="{{ route('login.staff.proses') }}" method="POST" class="space-y-5">

                        @csrf



                        <!-- Nama Staff -->

                        <div>

                            <label class="block text-gray-700 font-semibold mb-2 text-sm">
                                Nama Staff
                            </label>


                            <input
                                type="text"
                                name="nama_staff"
                                required
                                placeholder="Masukkan nama pengguna"
                                class="
                            w-full
                            px-4
                            py-3
                            border-2
                            border-gray-200
                            rounded-lg
                            text-gray-600
                            focus:outline-none
                            focus:border-red-500
                            transition
                            ">

                        </div>





                        <!-- Role -->

                        <div>

                            <label class="block text-gray-700 font-semibold mb-2 text-sm">
                                Posisi Jabatan
                            </label>


                            <div class="relative">


                                <select
                                    name="role_staff"
                                    required
                                    class="
                                w-full
                                px-4
                                py-3
                                border-2
                                border-gray-200
                                rounded-lg
                                text-gray-500
                                font-normal
                                appearance-none
                                bg-white
                                focus:outline-none
                                focus:border-red-500
                                transition
                                ">

                                    <option value="" disabled selected>
                                        Pilih posisi jabatan
                                    </option>


                                    <option value="Pelayan">
                                        Pelayan
                                    </option>


                                    <option value="Koki">
                                        Koki
                                    </option>


                                    <option value="Kasir">
                                        Kasir
                                    </option>


                                </select>



                                <!-- Dropdown Icon -->

                                <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">

                                    ▼

                                </div>



                            </div>


                        </div>





                        <!-- Password -->

                        <div>

                            <label class="block text-gray-700 font-semibold mb-2 text-sm">
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
                            text-gray-600
                            focus:outline-none
                            focus:border-red-500
                            transition
                            ">


                        </div>





                        <!-- Button -->

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




                    <!-- Back -->

                    <div class="text-center mt-6 pt-6 border-t border-gray-200">


                        <a
                            href="{{ url('/') }}"
                            class="
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




            <div class="text-center mt-8 text-gray-600 text-sm">

                © 2026 Ayam Geprek Bossku

            </div>



        </div>


    </div>


</body>

</html>