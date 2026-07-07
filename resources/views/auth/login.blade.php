<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pemilik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-8 py-8">
                <h1 class="text-3xl font-bold">Login Pemilik</h1>
                <p class="text-orange-100 mt-2">Masuk untuk mengelola restoran</p>
            </div>

            <div class="p-8">
                @if(session('error'))
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-5">
                    {{ session('error') }}
                </div>
                @endif

                @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-5">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label class="block text-gray-700 font-bold mb-2">Nama Pengguna Pemilik</label>
                        <input type="text" name="username" required
                            placeholder="Contoh: alvan"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Password</label>
                        <input type="password" name="password" required
                            placeholder="Masukkan password"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 text-white font-bold py-3 rounded-lg transition">
                        Login
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