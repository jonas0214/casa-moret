@extends('layouts.app')

@section('title', 'Mi Carrito | Casa Morêt')

@section('content')
<section class="section-padding bg-gray-50 pt-32 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-6xl text-cafe-secondary mb-4 font-serif">Tu Carrito</h2>
            <div class="w-20 h-1 bg-cafe-primary mx-auto"></div>
        </div>

        @livewire('cart-list')
    </div>
</section>
@endsection
