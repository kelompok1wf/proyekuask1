<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Restoran - Ayam Geprek Bossku</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="min-h-screen relative overflow-x-hidden bg-[#fff8f5]">


    <!-- Background Decoration -->

    <div class="
        absolute
        top-0
        left-0
        w-96
        h-96
        bg-red-200
        rounded-full
        blur-3xl
        opacity-30
    ">
    </div>


    <div class="
        absolute
        bottom-0
        right-0
        w-96
        h-96
        bg-orange-300
        rounded-full
        blur-3xl
        opacity-30
    ">
    </div>



    <div class="min-h-screen flex flex-col">


        <!-- Hero Section -->

        <section class="flex-1">


            <div class="max-w-6xl mx-auto px-6 pt-12 pb-10">



                <!-- Logo -->

                <div class="flex justify-center mb-5">


                    <img
                        src="{{ asset('images/logo-bossku.png') }}"
                        alt="Ayam Geprek Bossku"
                        class="
                        w-170
                        sm:w-50
                        md:w-97
                        h-auto
                        object-contain
                        drop-shadow-xl
                        hover:scale-105
                        transition
                        duration-300
                        ">


                </div>





                <!-- Branding -->


                <div class="text-center">



                    <h1 class="
                        text-4xl
                        sm:text-5xl
                        md:text-6xl
                        font-black
                        tracking-wide
                        text-[#b91c1c]
                        mb-3
                    ">
                        Ayam Geprek Bossku
                    </h1>




                    <p class="
                        text-lg
                        sm:text-xl
                        font-medium
                        text-gray-600
                        italic
                        mb-2
                    ">
                        "Level Pedas! Gak Ada Mati-Nya!"
                    </p>



                </div>



            </div>






            <!-- Login Card -->


            <div class="max-w-6xl mx-auto px-6 pb-12">



                <div class="grid md:grid-cols-2 gap-8">





                    <!-- Login Pemilik -->


                    <a href="{{ route('login') }}"
                        class="group">



                        <div class="
                            h-full
                            bg-gradient-to-br
                            from-red-100
                            via-orange-50
                            to-white
                            border
                            border-red-200
                            rounded-3xl
                            shadow-xl
                            hover:shadow-2xl
                            transition-all
                            duration-300
                            p-8
                            hover:-translate-y-2
                        ">




                            <div class="mb-8">



                                <h2 class="
                                    text-2xl
                                    font-extrabold
                                    text-gray-800
                                    group-hover:text-red-600
                                    transition
                                    mb-9
                                ">
                                    Login Pemilik
                                </h2>




                                <p class="text-gray-600 leading-relaxed">

                                    Kelola restoran, staff, dan laporan penjualan dengan mudah.

                                </p>



                            </div>






                            <button
                                type="button"
                                class="
                                    w-full
                                    py-4
                                    rounded-xl
                                    bg-gradient-to-r
                                    from-red-600
                                    to-orange-500
                                    text-white
                                    font-bold
                                    text-lg
                                    shadow-lg
                                    hover:shadow-xl
                                    hover:from-red-700
                                    hover:to-orange-600
                                    hover:scale-105
                                    transition-all
                                    duration-300
                                ">

                                Masuk Sebagai Pemilik

                            </button>




                        </div>



                    </a>









                    <!-- Login Staff -->



                    <a href="{{ route('login.staff') }}"
                        class="group">



                        <div class="
                            h-full
                            bg-gradient-to-br
                            from-orange-100
                            via-yellow-50
                            to-white
                            border
                            border-orange-200
                            rounded-3xl
                            shadow-xl
                            hover:shadow-2xl
                            transition-all
                            duration-300
                            p-8
                            hover:-translate-y-2
                        ">



                            <div class="mb-8">



                                <h2 class="
                                    text-2xl
                                    font-extrabold
                                    text-gray-800
                                    group-hover:text-orange-600
                                    transition
                                    mb-9
                                ">
                                    Login Staff
                                </h2>




                                <p class="text-gray-600 leading-relaxed">

                                    Pelayan, Koki, dan Kasir masuk melalui halaman ini.

                                </p>



                            </div>







                            <button
                                type="button"
                                class="
                                    w-full
                                    py-4
                                    rounded-xl
                                    bg-gradient-to-r
                                    from-red-600
                                    to-orange-500
                                    text-white
                                    font-bold
                                    text-lg
                                    shadow-lg
                                    hover:shadow-xl
                                    hover:from-red-700
                                    hover:to-orange-600
                                    hover:scale-105
                                    transition-all
                                    duration-300
                                ">


                                Masuk Sebagai Staff


                            </button>




                        </div>



                    </a>






                </div>



            </div>





        </section>






        <!-- Footer -->


        <footer class="
            py-5
            text-center
            text-sm
            text-gray-500
            border-t
            border-gray-200
            bg-white/60
        ">


            © 2026 Ayam Geprek Bossku - Sistem Manajemen Restoran Digital


        </footer>





    </div>



</body>

</html>