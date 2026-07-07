<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Staff</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">

        <!-- Header -->
        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                    <div>
                        <h1 class="text-4xl font-bold">Manajemen Staff</h1>
                        <p class="text-orange-100 mt-2">
                            Kelola data Pelayan, Koki, dan Kasir
                        </p>
                    </div>

                    <a href="{{ route('staff.create') }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-6 rounded-full shadow-lg transition transform hover:scale-105 text-center">
                        + Tambah Staff Baru
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            <!-- Navigation -->
            <div class="mb-8">
                <a href="{{ route('dashboard.pemilik') }}"
                    class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition">
                    ← Kembali ke Dashboard
                </a>
            </div>

            @if($staff->isEmpty())
                <div class="bg-white rounded-lg shadow-md p-12 text-center">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20a3 3 0 003-3v-2a3 3 0 00-3-3H3a3 3 0 00-3 3v2a3 3 0 003 3h3z">
                            </path>
                        </svg>
                    </div>

                    <p class="text-gray-500 text-lg mb-6">
                        Belum ada data staff
                    </p>

                    <a href="{{ route('staff.create') }}"
                        class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg transition">
                        Buat Staff Pertama
                    </a>
                </div>
            @else
                <div class="grid gap-6">
                    @foreach($staff as $item)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden">
                            <div class="bg-gradient-to-r from-red-400 to-orange-400 h-1"></div>

                            <div class="p-6">
                                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-6">

                                    <!-- Staff Info -->
                                    <div class="flex-1">
                                        <div class="flex items-center gap-4 mb-5">
                                            <div
                                                class="w-14 h-14 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold text-xl">
                                                    {{ strtoupper(substr($item->nama_staff, 0, 1)) }}
                                                </span>
                                            </div>

                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-800">
                                                    {{ $item->nama_staff }}
                                                </h3>
                                                <p class="text-gray-500">
                                                    ID: {{ $item->id_staff }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-4">
                                            <div>
                                                <p class="text-sm text-gray-500 mb-1">Role</p>
                                                <span
                                                    class="inline-block bg-yellow-100 text-yellow-800 px-4 py-1 rounded-full text-sm font-semibold">
                                                    {{ $item->role_staff }}
                                                </span>
                                            </div>

                                            <div>
                                                <p class="text-sm text-gray-500 mb-1">Kontak</p>
                                                <p class="font-semibold text-gray-800">
                                                    {{ $item->kontak_staff ?? '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex gap-3 lg:pt-2">
                                        <a href="{{ route('staff.edit', $item->id_staff) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-5 rounded-lg transition shadow">
                                            Edit
                                        </a>

                                        <form action="{{ route('staff.destroy', $item->id_staff) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus {{ $item->nama_staff }}?')"
                                                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-5 rounded-lg transition shadow">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</body>

</html>