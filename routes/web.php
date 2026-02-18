<?php

use App\Http\Controllers\CafeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CafeController::class, 'index'])->name('cafe.index');

// Tienda
Route::get('/tienda', [ShopController::class, 'index'])->name('shop.index');
Route::get('/tienda/{product:slug}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/carrito', function() { return view('shop.cart'); })->name('cart.index');
Route::get('/finalizar-compra', function() { return view('shop.checkout'); })->name('shop.checkout');
Route::post('/finalizar-compra', [ShopController::class, 'processCheckout'])->name('shop.checkout.post');
Route::get('/pedido-exitoso', function() { return view('shop.success'); })->name('shop.success');
Route::get('/checkout/redirect', function() {
    $data = session()->get('checkout_data');
    
    if (!$data) {
        \Log::warning('Intento de acceso a checkout/redirect sin datos en sesión');
        return redirect()->route('shop.index');
    }

    return view('shop.checkout_redirect', $data);
})->name('shop.checkout.redirect');
