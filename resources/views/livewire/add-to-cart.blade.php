<div>
    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 text-sm rounded-xl text-center font-bold animate-pulse">
            {{ session('message') }}
        </div>
    @endif

    <button wire:click="addToCart" class="btn-primary w-full flex items-center justify-center gap-3 py-5 rounded-2xl transform hover:scale-[1.02] transition-all">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
        </svg>
        AÑADIR AL CARRITO
    </button>
</div>
