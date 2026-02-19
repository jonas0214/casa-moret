@extends('layouts.app')

@section('content')
<section class="section-padding bg-cafe-light pt-32 min-h-screen flex items-center justify-center">
    <div class="text-center bg-white p-12 rounded-[3rem] shadow-2xl max-w-lg w-full">
        <h2 class="text-3xl font-serif text-cafe-secondary mb-4">Finaliza tu Pago</h2>
        <p class="text-gray-500 mb-8">Pedido <strong>#{{ $orderNumber }}</strong> por un valor de <strong>${{ number_format($total, 0, ',', '.') }} COP</strong></p>
        
        <div class="flex justify-center border-t border-gray-100 pt-8">
            <form action="{{ route('shop.success') }}" method="GET">
                <script
                    src="https://checkout.wompi.co/widget.js"
                    data-render="button"
                    data-public-key="{{ config('services.wompi.public_key') }}"
                    data-currency="COP"
                    data-amount-in-cents="{{ (int)round($total * 100) }}"
                    data-reference="{{ $orderNumber }}"
                    data-signature:integrity="{{ $signature }}"
                    data-redirect-url="{{ route('shop.success') }}"
                ></script>
            </form>
        </div>

        <div class="mt-8 text-[10px] text-gray-400 uppercase tracking-widest">
            Al hacer clic, serás redirigido a la plataforma segura de Wompi
        </div>

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
