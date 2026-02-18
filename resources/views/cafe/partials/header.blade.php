<header id="main-header" class="fixed top-0 w-full z-50 transition-all duration-500 bg-transparent">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center transition-all duration-500">
        <div class="logo flex items-center">
            <a href="#inicio" class="text-2xl font-serif font-bold tracking-tighter text-cafe-primary">CASA MORÊT</a>
        </div>
        
        <ul class="hidden md:flex items-center space-x-10">
            <li><a href="#inicio" class="text-sm uppercase tracking-widest font-semibold text-cafe-secondary hover:text-cafe-primary transition-colors border-b-2 border-cafe-primary pb-1">Inicio</a></li>
            <li><a href="#nuestro-cafe" class="text-sm uppercase tracking-widest font-semibold text-cafe-secondary hover:text-cafe-primary transition-colors pb-1">Nuestro Café</a></li>
            <li><a href="#origen" class="text-sm uppercase tracking-widest font-semibold text-cafe-secondary hover:text-cafe-primary transition-colors pb-1">Del origen a la taza</a></li>
            <li><a href="{{ route('shop.index') }}" class="text-sm uppercase tracking-widest font-semibold text-cafe-secondary hover:text-cafe-primary transition-colors pb-1">Productos</a></li>
            <li><a href="#contacto" class="text-sm uppercase tracking-widest font-semibold text-cafe-secondary hover:text-cafe-primary transition-colors pb-1">Contacto</a></li>
        </ul>

        <div class="flex items-center space-x-6">
            <!-- Shop Cart Icon -->
            @livewire('cart-icon')

            <!-- Admin Login Link -->
            <a href="/admin" class="text-sm uppercase tracking-widest font-bold text-cafe-secondary hover:text-cafe-primary transition-colors border border-cafe-secondary/20 px-4 py-2 rounded-lg hidden lg:block">
                Ingresar
            </a>

            <span class="text-xs font-bold tracking-tighter text-cafe-secondary">ES / EN</span>
            <!-- Mobile Menu Toggle -->
            <button id="mobile-menu-btn" class="md:hidden text-cafe-secondary focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </nav>
</header>
