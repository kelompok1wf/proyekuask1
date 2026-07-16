<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Ayam Geprek Bossku</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 min-h-screen">

    <div class="max-w-5xl mx-auto px-6 py-10">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <a href="{{ url()->previous() }}"
                class="flex items-center gap-2 text-gray-500 hover:text-gray-700 text-sm font-bold transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>

            <div class="text-center flex-1">
                <h1 class="text-2xl font-black text-red-600">Pembayaran Pesanan</h1>
                <p class="text-gray-400 text-sm mt-1">Selesaikan pembayaran untuk memproses pesananmu</p>
            </div>

            <div class="w-16"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Kolom Kiri: Info Pesanan --}}
            <div class="space-y-4">

                <div class="bg-white rounded-2xl shadow-md p-6">
                    <p class="font-bold text-sm">{{ $order->customer->name }}</p>
                    <p class="text-gray-500 text-xs mt-1">Meja {{ $order->customer->table_number }}</p>

                    <hr class="my-4 border-gray-100">

                    <p class="text-xs font-bold text-gray-400 uppercase mb-3">Detail Pesanan</p>
                    <div class="space-y-2">
                        @foreach($order->items as $item)
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-700">{{ $item->menu->name }}</span>
                            <span class="text-gray-500">x{{ $item->quantity }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-red-50 rounded-2xl shadow-sm p-6 text-center">
                    <p class="text-gray-500 text-xs">Total Pembayaran</p>
                    <h2 class="text-2xl font-black text-red-600 mt-1">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </h2>
                </div>

            </div>

            {{-- Kolom Kanan: Metode Pembayaran --}}
            <div class="space-y-4">

                <div class="bg-white rounded-2xl shadow-md p-6">
                    <h3 class="font-black text-sm mb-3">Pilih Metode Pembayaran</h3>

                    <div class="grid grid-cols-2 gap-3">
                        <button
                            id="btn-qris"
                            onclick="showQRIS()"
                            class="bg-green-600 text-white py-2.5 rounded-xl font-bold text-sm transition hover:opacity-90">
                            QRIS
                        </button>

                        <button
                            id="btn-tunai"
                            onclick="showTunai()"
                            class="bg-orange-500 text-white py-2.5 rounded-xl font-bold text-sm transition hover:opacity-90">
                            Tunai
                        </button>
                    </div>

                    {{-- Detail QRIS --}}
                    <div id="qris" class="hidden mt-4 pt-4 border-t border-gray-100">
                        <div class="bg-gray-50 rounded-2xl p-6 flex flex-col items-center">
                            <p class="font-bold text-sm mb-3">Scan QRIS untuk membayar</p>
                            <img src="{{ asset('images/qris-bossku.png') }}"
                                class="w-40 h-40 object-contain rounded-xl shadow-sm border bg-white p-2">
                            <p class="text-gray-400 text-xs mt-3 text-center">
                                Buka aplikasi e-wallet atau m-banking, lalu scan kode di atas
                            </p>
                        </div>
                    </div>

                    {{-- Detail Tunai --}}
                    <div id="tunai" class="hidden mt-4 pt-4 border-t border-gray-100">
                        <div class="bg-orange-50 rounded-xl p-5 text-center">
                            <p class="font-bold text-sm">Pembayaran dilakukan langsung ke kasir</p>
                            <p class="text-gray-400 text-xs mt-1">Silakan menuju kasir untuk membayar</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('pembayaran.selesai', $order->id) }}" method="POST">
                    @csrf
                    <button class="w-full py-3 rounded-xl bg-red-600 text-white font-bold shadow-md transition hover:opacity-90">
                        Pembayaran Selesai
                    </button>
                </form>

            </div>

        </div>

    </div>

    <script>
        function showQRIS() {
            document.getElementById('qris').classList.remove('hidden');
            document.getElementById('tunai').classList.add('hidden');
        }

        function showTunai() {
            document.getElementById('tunai').classList.remove('hidden');
            document.getElementById('qris').classList.add('hidden');
        }
    </script>

</body>

</html>