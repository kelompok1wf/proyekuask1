<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Staff Baru</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-lg">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <h1 class="text-4xl font-bold">Tambah Staff Baru</h1>
                <p class="text-orange-100 mt-2">Isi form di bawah untuk menambahkan staff baru</p>
            </div>
        </div>

        <!-- Form Container -->
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-red-400 to-orange-400 h-2"></div>

                <form action="{{ route('staff.store') }}" method="POST" class="p-8">
                    @csrf

                    <!-- Nama Staff -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-3 text-lg">
                            <svg class="inline w-5 h-5 mr-2 text-red-500">
                                <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                            </svg>
                            Nama Staff
                        </label>
                        <input type="text" name="nama_staff" placeholder="Masukkan nama staff"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-red-500 transition"
                            required>
                    </div>

                    <!-- Role Staff -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-3 text-lg">
                            <svg class="inline w-5 h-5 mr-2 text-red-500">
                                <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>
                            </svg>
                            Role Staff
                        </label>
                        <select name="role_staff" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-red-500 transition" required>
                            <option value="" disabled selected>Pilih role staff</option>
                            <option value="Pelayan">👨‍💼 Pelayan</option>
                            <option value="Koki">👨‍🍳 Koki</option>
                            <option value="Kasir">💰 Kasir</option>
                        </select>
                    </div>

                    <!-- Kontak -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-3 text-lg">
                            <svg class="inline w-5 h-5 mr-2 text-red-500">
                                <path fill="currentColor" d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"></path>
                            </svg>
                            Kontak
                        </label>
                        <input type="text" name="kontak_staff" placeholder="Contoh: 08123456789"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-red-500 transition">
                    </div>

                    <!-- Password -->
                    <div class="mb-8">
                        <label class="block text-gray-700 font-semibold mb-3 text-lg">
                            <svg class="inline w-5 h-5 mr-2 text-red-500">
                                <path fill="currentColor" d="M18 8h-1V6c0-2.76-2.24-5-5-5s-5 2.24-5 5v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"></path>
                            </svg>
                            Password
                        </label>
                        <input type="password" name="password" placeholder="Masukkan password"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-red-500 transition"
                            required>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105 shadow-lg">
                            💾 Simpan Staff
                        </button>
                        <a href="{{ route('staff.index') }}" class="flex-1 bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-6 rounded-lg transition text-center">
                            ❌ Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>