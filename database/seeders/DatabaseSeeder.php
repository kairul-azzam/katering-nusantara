<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tabel master dulu (tidak punya foreign key)
        City::factory(50)->create();
        Category::factory(10)->create();
        PaymentMethod::factory(3)->create();
        Courier::factory(10)->create();

        // 2. Tabel yang bergantung ke master
        Menu::factory(150)->create();
        Customer::factory(200)->create();

        // 3. Order (bergantung ke customer, payment_method, courier)
        $orders = Order::factory(150)->create();

        // 4. Ambil semua menu sekali saja (biar efisien, tidak query berulang di loop)
        $menus = Menu::all();

        // 5. Loop tiap order untuk generate 3-5 order items
        foreach ($orders as $order) {
            $jumlahItem = rand(3, 5);
            $menuTerpilih = $menus->random($jumlahItem);

            foreach ($menuTerpilih as $menu) {
                $qty = rand(1, 5);

                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $menu->id,
                    'qty' => $qty,
                    'subtotal' => $qty * $menu->price,
                ]);
            }
        }
    }
}
