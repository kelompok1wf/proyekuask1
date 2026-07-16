<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Antrean - Ayam Geprek Bossku</title>
    <meta http-equiv="refresh" content="5">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen p-8 font-['Poppins']">
    <header class="flex justify-between items-center border-b border-gray-800 pb-4 mb-6">
        <h1 class="text-2xl font-black text-red-600 tracking-wider">🔥 ANTREAN AYAM GEPREK BOSSKU</h1>
        <div class="text-xs bg-gray-900 px-3 py-1 rounded text-gray-500 font-mono">Auto Refresh: 5 Detik</div>
    </header>

    <div class="grid grid-cols-2 gap-8">
        <div class="bg-zinc-950 p-6 rounded-2xl border border-yellow-900/40">
            <h2 class="text-lg font-bold text-yellow-500 mb-4 tracking-wider uppercase">⏳ Sedang Dimasak</h2>
            <div class="grid grid-cols-2 gap-4">
                @forelse($antrean->where('status_pesanan', 'Sedang Dibuat') as $item)
                    <div class="bg-zinc-900 p-4 rounded-xl border border-zinc-800">
                        <div class="text-3xl font-black text-white">#{{ $item->id_pesanan }}</div>
                        <div class="text-xs text-gray-400 font-medium mt-1 uppercase">{{ $item->pelanggan->nama_pelanggan }}</div>
                        <div class="text-xs text-yellow-600 font-bold mt-2">
                            {{ $item->pelanggan->jenis_layanan === 'dine-in' ? 'Meja ' . $item->pelanggan->no_meja : '-' }}
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center text-zinc-700 py-12 text-sm">Tidak ada antrean masakan.</div>
                @endforelse
            </div>
        </div>

        <div class="bg-zinc-950 p-6 rounded-2xl border border-green-900/40">
            <h2 class="text-lg font-bold text-green-500 mb-4 tracking-wider uppercase">🎉 Siap Diambil / Disajikan</h2>
            <div class="grid grid-cols-2 gap-4">
                @forelse($antrean->where('status_pesanan', 'Sudah Dibuat') as $item)
                    <div class="bg-green-950/20 p-4 rounded-xl border border-green-900/50 animate-pulse">
                        <div class="text-4xl font-black text-green-400">#{{ $item->id_pesanan }}</div>
                        <div class="text-xs text-green-200 font-medium mt-1 uppercase">{{ $item->pelanggan->nama_pelanggan }}</div>
                        <div class="text-xs text-green-500 font-bold mt-2">
                            {{ $item->pelanggan->jenis_layanan === 'dine-in' ? 'Meja ' . $item->pelanggan->no_meja : '-' }}
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center text-zinc-700 py-12 text-sm">Belum ada pesanan yang matang.</div>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>