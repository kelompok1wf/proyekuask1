<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Staff</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <div class="min-h-screen flex items-center justify-center">

        <div class="bg-white rounded-xl shadow-lg w-full max-w-md overflow-hidden">

            <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white p-8">
                <h1 class="text-3xl font-bold">
                    Login Staff
                </h1>

                <p class="mt-2">
                    Masuk sesuai jabatan staff
                </p>
            </div>


            <div class="p-8">

                @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
                @endif


                <form action="{{ route('login.staff.proses') }}" method="POST">

                    @csrf


                    <div class="mb-4">

                        <label class="font-bold">
                            Nama Staff
                        </label>

                        <input
                            type="text"
                            name="nama_staff"
                            class="w-full border rounded-lg p-3 mt-2"
                            placeholder="Masukkan nama staff">

                    </div>


                    <div class="mb-4">

                        <label class="font-bold">
                            Role Staff
                        </label>

                        <select
                            name="role_staff"
                            class="w-full border rounded-lg p-3 mt-2">

                            <option value="">
                                Pilih Role
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

                    </div>


                    <div class="mb-5">

                        <label class="font-bold">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full border rounded-lg p-3 mt-2"
                            placeholder="Password">

                    </div>


                    <button
                        class="w-full bg-gradient-to-r from-red-500 to-orange-500 text-white font-bold py-3 rounded-lg">

                        Login Staff

                    </button>


                </form>


                <div class="text-center mt-5">

                    <a href="{{ url('/') }}"
                        class="text-red-500 hover:underline">

                        ← Kembali ke Pilihan Login

                    </a>

                </div>


            </div>

        </div>

    </div>

</body>

</html>