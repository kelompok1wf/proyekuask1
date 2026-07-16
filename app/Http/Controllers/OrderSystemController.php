<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderSystemController extends Controller {
    
    public function showLogin() {
        if(session()->has('customer')) return redirect()->route('menu');
        return view('orders.login');
    }

    public function processLogin(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'table_number' => 'required|string|max:10'
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'table_number' => $request->table_number
        ]);

        session(['customer' => $customer, 'cart' => []]);
        return redirect()->route('menu');
    }

    public function showMenu(Request $request) {
        if(!session()->has('customer')) return redirect()->route('login');
        
        $category = $request->get('category', 'Semua');
        if($category != 'Semua') {
            $menus = Menu::where('category', $category)->get();
        } else {
            $menus = Menu::all();
        }

        return view('orders.menu', compact('menus', 'category'));
    }

    public function addToCart(Request $request) {
        $menuId = $request->menu_id;
        $menu = Menu::findOrFail($menuId);
        $cart = session()->get('cart', []);

        if(isset($cart[$menuId])) {
            $cart[$menuId]['quantity']++;
        } else {
            $cart[$menuId] = [
                "name" => $menu->name,
                "quantity" => 1,
                "price" => $menu->price,
                "image" => $menu->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Menu ditambahkan ke keranjang!');
    }

    public function updateCart(Request $request, $id)
{
    // 1. Ambil data menu dari database
    $menu = \App\Models\Menu::findOrFail($id);
    
    // 2. Ambil data cart saat ini dari session
    $cart = session()->get('cart', []);
    
    $action = $request->input('action');

    if ($action === 'increase') {
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika belum ada di keranjang, tambahkan baru
            $cart[$id] = [
                "name" => $menu->name,
                "quantity" => 1,
                "price" => $menu->price,
                "category" => $menu->category
            ];
        }
    } elseif ($action === 'decrease') {
        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;
            // Jika kuantitasnya 0 atau kurang, hapus dari keranjang
            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }
        }
    }

    // 3. Simpan kembali perubahan ke dalam session
    session()->put('cart', $cart);

    // 4. Kembalikan halaman ke menu utama dengan data paling baru
    return redirect()->back();
}

    public function showCheckout() {
        if(!session()->has('customer')) return redirect()->route('login');
        return view('orders.checkout');
    }

    public function processOrder() {
        $cart = session()->get('cart', []);
        $customerSession = session()->get('customer');

        if(empty($cart) || !$customerSession) return redirect()->route('menu');

        $totalPrice = 0;
        foreach($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'customer_id' => $customerSession['id'],
            'total_price' => $totalPrice,
            'status' => 'Pending'
        ]);

        foreach($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $id,
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity']
            ]);
        }

        session()->forget('cart');
        return redirect()->route('receipt', $order->id);
    }

    public function showReceipt($id) {
        $order = Order::with(['customer', 'items.menu'])->findOrFail($id);
        return view('orders.receipt', compact('order'));
    }

    public function logout() {
        session()->forget(['customer', 'cart']);
        return redirect()->route('login');
    }
}