<a href="{{ route('cart.index') }}" class="relative text-cafe-secondary hover:text-cafe-primary transition-colors">
    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
    </svg>
    @if($cartCount > 0)
        <span class="absolute -top-1 -right-1 bg-cafe-primary text-white text-[10px] font-bold w-4 h-4 flex items-center justify-center rounded-full shadow-sm animate-bounce">
            {{ $cartCount }}
        </span>
    @endif
</a>
