<?php
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
