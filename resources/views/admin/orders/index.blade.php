<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pesanan</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Pesanan - Rasa Nusantara</h1>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-3">ID Order</th>
                        <th class="px-4 py-3">Pelanggan</th>
                        <th class="px-4 py-3">Pesanan</th>
                        <th class="px-4 py-3">Pengiriman & Pembayaran</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($orders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">#{{ $order->id }}</td>
                            <td class="px-4 py-3">
                                {{ $order->customer->name }}
                                <span class="block text-xs text-gray-500">{{ $order->customer->city->name }}</span>
                            </td>
                            <td class="px-4 py-3">
                                @foreach ($order->orderItems as $item)
                                    <div class="text-xs">
                                        {{ $item->qty }}x {{ $item->menu->name }}
                                        <span class="text-gray-400">({{ $item->menu->category->name }})</span>
                                    </div>
                                @endforeach
                            </td>
                            <td class="px-4 py-3">
                                {{ $order->courier->name }}
                                <span class="block text-xs text-gray-500">{{ $order->paymentMethod->name }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</body>
</html>