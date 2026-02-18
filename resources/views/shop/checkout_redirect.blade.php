@extends('layouts.app')

@section('content')
<section class="section-padding bg-cafe-light pt-32 min-h-screen flex items-center justify-center">
    <div class="text-center bg-white p-12 rounded-[3rem] shadow-2xl max-w-lg w-full">
        <div class="w-20 h-20 border-4 border-cafe-primary border-t-transparent rounded-full animate-spin mx-auto mb-8"></div>
        <h2 class="text-3xl font-serif text-cafe-secondary mb-4">Redirigiendo a Pago Seguro</h2>
        <p class="text-gray-500 mb-8">Estamos conectando con Wompi para procesar tu pedido <strong>#{{ $orderNumber }}</strong></p>
        
        <form action="https://checkout.wompi.co/p/" method="GET" id="wompi-form">
            {{-- Para Sandbox/Pruebas se usa la misma URL de producción pero con una llave de test --}}
            {{-- Públicas --}}
            <input type="hidden" name="public-key" value="{{ config('services.wompi.public_key') }}" />
            <input type="hidden" name="currency" value="COP" />
            <input type="hidden" name="amount-in-cents" value="{{ (int)(round($total) * 100) }}" />
            <input type="hidden" name="reference" value="{{ $orderNumber }}" />
            
            {{-- URLs de Redirección --}}
            {{-- Cambiamos temporalmente a un dominio ficticio para evitar el bloqueo 403 de CloudFront (Wompi) en local --}}
            <input type="hidden" name="redirect-url" value="https://mipasteleriaficticia.com/pedido-exitoso" />
            
            {{-- Datos del Cliente (Opcional en Widget pero recomendado) --}}
            <input type="hidden" name="customer-data:email" value="{{ $customer['email'] ?? '' }}" />
            <input type="hidden" name="customer-data:full-name" value="{{ $customer['name'] ?? '' }}" />
            
            {{-- Datos de Envío --}}
            <input type="hidden" name="shipping-address:address-line-1" value="{{ $customer['address'] ?? '' }}" />
            <input type="hidden" name="shipping-address:city" value="{{ $customer['city'] ?? '' }}" />
            <input type="hidden" name="shipping-address:phone-number" value="{{ $customer['phone'] ?? $customer['customer_phone'] ?? '3000000000' }}" />
            <input type="hidden" name="shipping-address:region" value="{{ $customer['city'] ?? '' }}" />
            <input type="hidden" name="shipping-address:country" value="CO" />

            <noscript>
                <button type="submit" class="btn-primary px-8 py-3 rounded-xl">Pagar con Wompi</button>
            </noscript>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Pequeño delay para feedback visual
                setTimeout(function() {
                    document.getElementById('wompi-form').submit();
                }, 1000);
            });
        </script>
    </div>
</section>
@endsection
