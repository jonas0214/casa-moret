@extends('layouts.app')

@section('title', 'Tienda | Casa Morêt')

@section('content')
<section class="section-padding bg-cafe-light pt-32">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-6xl text-cafe-secondary mb-4">Nuestra Tienda</h2>
            <p class="text-gray-600 max-w-2xl mx-auto italic">Seleccionamos los mejores granos de nuestra finca para llevar la excelencia de San Antonio a tu mesa.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group">
                <div class="relative h-72 overflow-hidden">
                    @if($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-cafe-secondary/10 flex items-center justify-center text-cafe-secondary/20">
                            <span class="text-6xl">☕</span>
                        </div>
                    @endif
                    <div class="absolute top-4 right-4">
                        <span class="bg-cafe-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">
                            {{ $product->category->name }}
                        </span>
                    </div>
                </div>
                
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-serif text-cafe-secondary mb-2">{{ $product->name }}</h3>
                    <p class="text-cafe-primary font-bold text-xl mb-6">${{ number_format($product->price, 0, ',', '.') }} COP</p>
                    
                    <a href="{{ route('shop.show', $product->slug) }}" class="btn-outline w-full text-center py-3 block rounded-xl">VER DETALLES</a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20">
                <p class="text-gray-500 italic">Próximamente tendremos nuestros productos disponibles para ti.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
