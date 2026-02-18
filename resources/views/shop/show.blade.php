@extends('layouts.app')

@section('title', $product->name . ' | Casa Morêt')

@section('content')
<section class="section-padding bg-cafe-light pt-32">
    <div class="container mx-auto px-6">
        <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <!-- Imagen del Producto -->
                <div class="md:w-1/2 h-[500px] relative">
                    @if($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-cafe-secondary/10 flex items-center justify-center text-cafe-secondary/20">
                            <span class="text-9xl">☕</span>
                        </div>
                    @endif
                    <div class="absolute top-8 left-8">
                        <span class="bg-cafe-primary text-white text-xs font-bold px-4 py-2 rounded-full uppercase tracking-widest shadow-lg">
                            {{ $product->category->name }}
                        </span>
                    </div>
                </div>

                <!-- Detalles del Producto -->
                <div class="md:w-1/2 p-12 md:p-20 flex flex-col justify-center">
                    <nav class="mb-8 text-xs uppercase tracking-widest text-gray-400">
                        <a href="{{ route('shop.index') }}" class="hover:text-cafe-primary">Tienda</a>
                        <span class="mx-2">/</span>
                        <span class="text-cafe-secondary font-bold">{{ $product->name }}</span>
                    </nav>

                    <h1 class="text-4xl md:text-6xl font-serif text-cafe-secondary mb-6">{{ $product->name }}</h1>
                    
                    <div class="flex items-center gap-6 mb-10">
                        <p class="text-3xl md:text-4xl text-cafe-primary font-bold">${{ number_format($product->price, 0, ',', '.') }} COP</p>
                        @if($product->stock > 0)
                            <span class="text-xs font-bold text-green-600 bg-green-100 px-3 py-1 rounded-full uppercase tracking-tighter">En Stock: {{ $product->stock }}</span>
                        @else
                            <span class="text-xs font-bold text-red-600 bg-red-100 px-3 py-1 rounded-full uppercase tracking-tighter">Agotado</span>
                        @endif
                    </div>

                    <div class="prose prose-cafe mb-12 text-gray-600 leading-relaxed italic">
                        {!! $product->description !!}
                    </div>

                    @if($product->stock > 0)
                    <div class="flex flex-col sm:flex-row gap-4">
                        @livewire('add-to-cart', ['productId' => $product->id])
                    </div>
                    @endif

                    <div class="mt-12 pt-12 border-t border-gray-100 grid grid-cols-2 gap-8 text-center sm:text-left">
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">Envío Garantizado</p>
                            <p class="text-sm font-semibold text-cafe-secondary">Toda Colombia</p>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-gray-400 mb-2">Pago Seguro</p>
                            <p class="text-sm font-semibold text-cafe-secondary">Wompi / Mercado Pago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
