<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; // Ambil baris ini jangan sampai tertinggal

class MenuSeeder extends Seeder {
    public function run(): void {
        // 1. Matikan pengecekan foreign key sementara
        Schema::disableForeignKeyConstraints();

        // 2. Kosongkan tabel menus dengan aman tanpa diomelin database
        Menu::truncate();

        // 3. Nyalakan kembali pengecekan foreign key demi keamanan data ke depan
        Schema::enableForeignKeyConstraints();

        $menus = [
            // KATEGORI: PAKET
            [
                'name' => 'Paket Geprek Bossku',
                'price' => 18000,
                'category' => 'Paket',
                'description' => 'Nasi + Ayam Geprek + Es Teh + Lalapan segar.'
            ],
            [
                'name' => 'Paket Geprek Keju',
                'price' => 22000,
                'category' => 'Paket',
                'description' => 'Nasi + Ayam Geprek Leleh Keju + Es Teh + Lalapan.'
            ],
            [
                'name' => 'Paket Geprek Moza',
                'price' => 25000,
                'category' => 'Paket',
                'description' => 'Nasi + Ayam Geprek Mozzarella Bakar + Es Teh.'
            ],

            // KATEGORI: MAKANAN (ALA CARTE)
            [
                'name' => 'Ayam Geprek Ala Carte',
                'price' => 13000,
                'category' => 'Makanan',
                'description' => 'Ayam Goreng Krispi yang digeprek dengan sambal korek (tanpa nasi).'
            ],
            [
                'name' => 'Nasi Putih Premium',
                'price' => 5000,
                'category' => 'Makanan',
                'description' => 'Nasi putih hangat pulen porsi pas.'
            ],
            [
                'name' => 'Mie Goreng Geprek',
                'price' => 15000,
                'category' => 'Makanan',
                'description' => 'Mie goreng spesial disajikan dengan topping Ayam Geprek pedas.'
            ],

            // KATEGORI: MINUMAN
            [
                'name' => 'Es Teh Manis',
                'price' => 4000,
                'category' => 'Minuman',
                'description' => 'Es teh manis segar, penawar pedas paling pas.'
            ],
            [
                'name' => 'Es Jeruk Peras',
                'price' => 7000,
                'category' => 'Minuman',
                'description' => 'Dari jeruk peras segar asli alami.'
            ],
            [
                'name' => 'Air Mineral Botol',
                'price' => 5000,
                'category' => 'Minuman',
                'description' => 'Air mineral kemasan botol dingin / biasa.'
            ],

            // KATEGORI: EKSTRA / SIDE DISHES
            [
                'name' => 'Ekstra Sambal Korek',
                'price' => 3000,
                'category' => 'Makanan',
                'description' => 'Satu porsi tambahan sambal korek bawang super pedas.'
            ],
            [
                'name' => 'Tahu / Tempe Goreng',
                'price' => 2000,
                'category' => 'Makanan',
                'description' => '1 potong tahu atau tempe goreng krispi sebagai pelengkap.'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}