<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Staff</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-lg">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <h1 class="text-4xl font-bold">Detail Staff</h1>
                <p class="text-orange-100 mt-2">Lihat informasi lengkap staff</p>
            </div>
        </div>

        <!-- Detail Container -->
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-red-400 to-orange-400 h-2"></div>

                <div class="p-8">
                    <!-- Staff Header -->
                    <div class="flex items-center gap-6 mb-8 pb-8 border-b-2 border-gray-100">
                        <div class="w-20 h-20 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-4xl">{{ substr($staff->nama_staff, 0, 1) }}</span>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-800">{{ $staff->nama_staff }}</h2>
                            <p class="text-gray-500 text-lg">ID Staff: {{ $staff->id_staff }}</p>
                        </div>
                    </div>

                    <!-- Staff Details -->
                    <div class="grid md:grid-cols-2 gap-8 mb-8">
                        <!-- Role -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-lg">
                            <p class="text-gray-500 text-sm font-semibold mb-2 uppercase">Posisi Jabatan</p>
                            <span class="inline-block bg-yellow-100 text-yellow-800 px-4 py-2 rounded-full text-lg font-semibold">
                                {{ $staff->role_staff }}
                            </span>
                        </div>

                        <!-- Kontak -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-lg">
                            <p class="text-gray-500 text-sm font-semibold mb-2 uppercase">Nomor Kontak</p>
                            <p class="text-xl font-semibold text-gray-800">{{ $staff->kontak_staff ?? '-' }}</p>
                        </div>

                        <!-- Tanggal Dibuat -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-lg">
                            <p class="text-gray-500 text-sm font-semibold mb-2 uppercase">Tanggal Dibuat</p>
                            <p class="text-lg font-semibold text-gray-800">
                                {{ $staff->created_at ? $staff->created_at->format('d M Y') : '-' }}
                            </p>
                        </div>

                        <!-- Terakhir Diperbarui -->
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-lg">
                            <p class="text-gray-500 text-sm font-semibold mb-2 uppercase">Terakhir Diperbarui</p>
                            <p class="text-lg font-semibold text-gray-800">
                                {{ $staff->updated_at ? $staff->updated_at->format('d M Y H:i') : '-' }}
                            </p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 pt-6 border-t-2 border-gray-100">
                        <a href="{{ route('staff.edit', $staff->id_staff) }}" class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105 shadow-lg text-center">
                            ✏️ Edit Staff
                        </a>
                        <a href="{{ route('staff.index') }}" class="flex-1 bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-6 rounded-lg transition text-center">
                            ← Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>