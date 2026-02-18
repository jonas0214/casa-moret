@extends('layouts.app')

@section('title', 'Finalizar Compra | Casa Morêt')

@section('content')
<section class="section-padding bg-gray-50 pt-32 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-6xl text-cafe-secondary mb-4 font-serif">Finalizar Compra</h2>
            <div class="w-20 h-1 bg-cafe-primary mx-auto"></div>
        </div>

        @livewire('checkout')
    </div>
</section>
@endsection
