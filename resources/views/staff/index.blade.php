<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Staff</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-4xl font-bold">Manajemen Staff</h1>
                        <p class="text-orange-100 mt-2">Kelola data karyawan dengan mudah</p>
                    </div>
                    <a href="{{ route('staff.create') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-3 px-6 rounded-full shadow-lg transition transform hover:scale-105">
                        + Tambah Staff Baru
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            @if($staff->isEmpty())
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <div class="text-gray-400 mb-4">
                    <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20a3 3 0 003-3v-2a3 3 0 00-3-3H3a3 3 0 00-3 3v2a3 3 0 003 3h3z"></path>
                    </svg>
                </div>
                <p class="text-gray-500 text-lg mb-6">Belum ada data staff</p>
                <a href="{{ route('staff.create') }}" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition">
                    Buat Staff Pertama
                </a>
            </div>
            @else
            <div class="grid gap-6">
                @foreach($staff as $item)
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                    <div class="bg-gradient-to-r from-red-400 to-orange-400 h-1"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold text-lg">{{ substr($item->nama_staff, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800">{{ $item->nama_staff }}</h3>
                                        <p class="text-gray-500">ID: {{ $item->id_staff }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">Role</p>
                                        <span class="inline-block bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold">
                                            {{ $item->role_staff }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">Kontak</p>
                                        <p class="font-semibold text-gray-800">{{ $item->kontak_staff ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('staff.edit',$item->id_staff) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition">
                                    Edit
                                </a>
                                <form action="{{ route('staff.destroy',$item->id_staff) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus {{ $item->nama_staff }}?')" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">
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

</table>

</body>

</html>