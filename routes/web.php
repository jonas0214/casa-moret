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

    // Asegurar que la firma se genere siempre con el secreto correcto y sin decimales
    $amountInCents = (int)round($data['total'] * 100);
    $currency = 'COP';
    $integritySecret = config('services.wompi.integrity_key');
    $orderNumber = $data['orderNumber'];
    
    // El orden de concatenación es crítico: Referencia + MontoEnCentavos + Moneda + Secreto
    $signatureString = $orderNumber . $amountInCents . $currency . $integritySecret;
    $data['signature'] = hash('sha256', $signatureString);

    // DEBUG: Log para verificar los valores concatenados
    \Log::info("Wompi Integrity Check", [
        'string' => $orderNumber . $amountInCents . $currency . 'SECRET_HIDDEN',
        'hash' => $data['signature']
    ]);

    return view('shop.checkout_redirect', $data);
})->name('shop.checkout.redirect');
