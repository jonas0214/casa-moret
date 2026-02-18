@extends('layouts.app')

@section('title', '¡Pedido Recibido! | Casa Morêt')

@section('content')
<section class="section-padding bg-cafe-light pt-32 min-h-screen flex items-center">
    <div class="container mx-auto px-6 text-center">
        <div class="bg-white max-w-2xl mx-auto rounded-[3rem] shadow-2xl p-12 md:p-20">
            <div class="text-7xl mb-8">🌿</div>
            <h1 class="text-4xl md:text-5xl font-serif text-cafe-secondary mb-6">¡Gracias por tu compra!</h1>
            <p class="text-gray-600 mb-8 leading-relaxed">Tu pedido <span class="font-bold text-cafe-primary">#{{ request('order') }}</span> ha sido recibido con éxito. En breve nos pondremos en contacto contigo para finalizar los detalles del envío.</p>
            
            <div class="space-y-4">
                <a href="{{ route('cafe.index') }}" class="btn-primary block w-full py-4 rounded-2xl">VOLVER AL INICIO</a>
                <a href="https://wa.me/yournumber" class="text-cafe-secondary font-bold text-sm uppercase tracking-widest hover:text-cafe-primary transition-colors">¿Tienes dudas? Escríbenos</a>
            </div>
        </div>
    </div>
</section>
@endsection
