<div class="flex flex-col lg:flex-row gap-12">
    <!-- Formulario de Envío -->
    <div class="lg:w-2/3">
        <div class="bg-white rounded-[3rem] shadow-xl p-8 md:p-12">
            <h3 class="text-2xl font-serif text-cafe-secondary mb-8 border-b border-gray-100 pb-4">Información de Envío</h3>
            
            <form wire:submit.prevent="placeOrder" class="space-y-6">
                @if(session()->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest font-bold text-gray-400">Nombre Completo</label>
                        <input wire:model="name" type="text" required class="w-full bg-gray-50 border-none rounded-xl p-4 focus:ring-2 focus:ring-cafe-primary transition-all">
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest font-bold text-gray-400">Correo Electrónico</label>
                        <input wire:model="email" type="email" required class="w-full bg-gray-50 border-none rounded-xl p-4 focus:ring-2 focus:ring-cafe-primary transition-all">
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest font-bold text-gray-400">Teléfono / WhatsApp</label>
                        <input wire:model="phone" type="text" required class="w-full bg-gray-50 border-none rounded-xl p-4 focus:ring-2 focus:ring-cafe-primary transition-all">
                        @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest font-bold text-gray-400">Ciudad</label>
                        <input wire:model="city" type="text" required class="w-full bg-gray-50 border-none rounded-xl p-4 focus:ring-2 focus:ring-cafe-primary transition-all">
                        @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest font-bold text-gray-400">Tipo de Documento</label>
                        <select wire:model="doc_type" required class="w-full bg-gray-50 border-none rounded-xl p-4 focus:ring-2 focus:ring-cafe-primary transition-all">
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="NIT">NIT</option>
                            <option value="PP">Pasaporte</option>
                        </select>
                        @error('doc_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest font-bold text-gray-400">Número de Documento</label>
                        <input wire:model="doc_number" type="text" required class="w-full bg-gray-50 border-none rounded-xl p-4 focus:ring-2 focus:ring-cafe-primary transition-all">
                        @error('doc_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs uppercase tracking-widest font-bold text-gray-400">Dirección Completa</label>
                    <textarea wire:model="address" rows="3" required class="w-full bg-gray-50 border-none rounded-xl p-4 focus:ring-2 focus:ring-cafe-primary transition-all"></textarea>
                    @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="pt-6 border-t border-gray-100 mt-8">
                    <p class="text-xs text-gray-400 italic mb-8">Al hacer clic en "Realizar Pedido", serás redirigido a la pasarela segura de Wompi para pagar con PSE, Tarjeta o Efectivo.</p>
                    
                    <button type="submit" class="btn-primary w-full py-5 rounded-2xl shadow-xl transform hover:scale-105 transition-all text-xl">
                        REALIZAR PEDIDO Y PAGAR
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Resumen de Orden -->
    <div class="lg:w-1/3">
        <div class="bg-cafe-secondary text-white rounded-[3rem] shadow-xl p-8 md:p-10 sticky top-32">
            <h3 class="text-xl font-serif mb-8 border-b border-white/10 pb-4">Resumen de tu Orden</h3>
            
            <div class="space-y-6 mb-8 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                @foreach($cart as $item)
                    <div class="flex justify-between items-center gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center text-xs">☕</div>
                            <div>
                                <p class="text-sm font-bold">{{ $item['name'] }}</p>
                                <p class="text-[10px] text-gray-400 uppercase tracking-widest">Cant: {{ $item['quantity'] }}</p>
                            </div>
                        </div>
                        <p class="text-sm font-bold">${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>

            <div class="pt-6 border-t border-white/10 space-y-4">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">Subtotal</span>
                    <span>${{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">Envío</span>
                    <span class="text-green-400 font-bold uppercase text-[10px] tracking-widest">Calculado en contacto</span>
                </div>
                <div class="flex justify-between items-center pt-4 text-xl border-t border-white/5">
                    <span class="font-serif">Total</span>
                    <span class="text-cafe-primary font-bold">${{ number_format($total, 0, ',', '.') }} COP</span>
                </div>
            </div>
        </div>
    </div>
</div>
