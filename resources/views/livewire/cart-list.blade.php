<div class="bg-white rounded-[3rem] shadow-2xl p-8 md:p-12">
    @if(count($cart) > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs uppercase tracking-widest text-gray-400 border-b border-gray-100">
                        <th class="pb-6">Producto</th>
                        <th class="pb-6">Precio</th>
                        <th class="pb-6">Cantidad</th>
                        <th class="pb-6 text-right">Subtotal</th>
                        <th class="pb-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($cart as $id => $item)
                        <tr class="group">
                            <td class="py-8 flex items-center gap-6">
                                <div class="w-20 h-20 rounded-2xl overflow-hidden bg-gray-100">
                                    @if($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-2xl">☕</div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-serif text-xl text-cafe-secondary">{{ $item['name'] }}</h4>
                                </div>
                            </td>
                            <td class="py-8 text-cafe-primary font-bold">
                                ${{ number_format($item['price'], 0, ',', '.') }}
                            </td>
                            <td class="py-8">
                                <div class="flex items-center border border-gray-200 rounded-xl w-max overflow-hidden">
                                    <button wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] - 1 }})" class="px-4 py-2 hover:bg-gray-50 text-gray-500">-</button>
                                    <span class="px-4 py-2 font-bold text-cafe-secondary">{{ $item['quantity'] }}</span>
                                    <button wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] + 1 }})" class="px-4 py-2 hover:bg-gray-50 text-gray-500">+</button>
                                </div>
                            </td>
                            <td class="py-8 text-right font-bold text-cafe-secondary text-xl">
                                ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </td>
                            <td class="py-8 text-right">
                                <button wire:click="removeFromCart({{ $id }})" class="text-gray-300 hover:text-red-500 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-12 flex flex-col md:flex-row justify-between items-start gap-12 pt-12 border-t-2 border-dashed border-gray-100">
            <div class="w-full md:w-1/2">
                <a href="{{ route('shop.index') }}" class="text-cafe-primary font-bold flex items-center gap-2 hover:gap-4 transition-all">
                    ← SEGUIR COMPRANDO
                </a>
            </div>
            
            <div class="w-full md:w-1/3 bg-cafe-light p-8 rounded-3xl">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-gray-500 uppercase tracking-widest text-xs">Total Compra</span>
                    <span class="text-3xl font-serif text-cafe-secondary font-bold">${{ number_format($total, 0, ',', '.') }} COP</span>
                </div>
                <a href="{{ route('shop.checkout') }}" class="btn-primary w-full py-5 rounded-2xl shadow-xl transform hover:scale-105 transition-all block text-center">
                    FINALIZAR COMPRA
                </a>
            </div>
        </div>
    @else
        <div class="text-center py-20">
            <div class="text-6xl mb-6">🛒</div>
            <h3 class="text-3xl font-serif text-cafe-secondary mb-4">Tu carrito está vacío</h3>
            <p class="text-gray-500 mb-10">¿Aún no has elegido tu café ideal para hoy?</p>
            <a href="{{ route('shop.index') }}" class="btn-primary">IR A LA TIENDA</a>
        </div>
    @endif
</div>
