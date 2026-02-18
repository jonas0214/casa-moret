@extends('layouts.app')

@section('content')
<section id="inicio" class="relative h-screen flex items-center justify-center text-center text-white pt-20">
    <!-- Hero Background with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&q=80&w=2070" class="w-full h-full object-cover" alt="Hero Background">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    </div>
    
    <div class="relative z-10 max-w-4xl px-4">
        <h1 class="text-5xl md:text-7xl mb-6">Café de especialidad <span class="block italic font-light mt-2 text-cafe-light">fiel a su origen</span></h1>
        <p class="text-xl md:text-2xl mb-10 font-light leading-relaxed">Nacido en las montañas de San Antonio – Sevilla, Valle del Cauca y procesado con la disciplina que exige una taza limpia, dulce y consistente.</p>
        <a href="#nuestro-cafe" class="btn-primary transform hover:scale-105 transition-transform duration-300">DESCUBRE NUESTRO CAFÉ</a>
    </div>
</section>

<section id="nuestra-esencia" class="section-padding bg-cafe-light">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-12 md:gap-20">
            <div class="md:w-1/2">
                <h2 class="text-4xl md:text-6xl text-cafe-secondary mb-8">Nuestra esencia</h2>
                <div class="space-y-6 text-lg leading-relaxed text-gray-700">
                    <p>Casa Morêt es una marca que entiende el café desde su origen. Creemos en el valor de cuidar cada etapa del proceso con criterio, disciplina y respeto por el territorio, construyendo una relación consistente entre origen, manejo y resultado en taza.</p>
                    <p>Nuestra forma de hacer café tiene recorrido: nace de la experiencia, se sostiene en la práctica y se afina de manera constante.</p>
                </div>
                <a href="#" class="btn-outline mt-10">MÁS SOBRE CASA MORÊT</a>
            </div>
            <div class="md:w-1/2">
                <div class="aspect-video md:aspect-square w-full rounded-2xl shadow-2xl overflow-hidden grayscale hover:grayscale-0 transition-all duration-700">
                    <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&q=80&w=1961" class="w-full h-full object-cover" alt="Nuestra Esencia">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="lo-que-nos-define" class="bg-white">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <!-- Origen Único -->
        <div class="relative group h-[500px] overflow-hidden flex flex-col justify-end p-8 text-center text-white">
            <img src="https://images.unsplash.com/photo-1559056199-641a0ac8b55e?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Origen único">
            <div class="absolute inset-0 bg-gradient-to-t from-cafe-secondary via-cafe-secondary/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
            <div class="relative z-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                <h3 class="text-3xl font-serif mb-4">Origen único</h3>
                <p class="text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 leading-relaxed">Café de una sola procedencia, sin mezclas que alteren su identidad.</p>
                <div class="w-12 h-0.5 bg-cafe-primary mx-auto mt-6 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>
        </div>
        
        <!-- Rigor -->
        <div class="relative group h-[500px] overflow-hidden flex flex-col justify-end p-8 text-center text-white">
            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Rigor">
            <div class="absolute inset-0 bg-gradient-to-t from-cafe-accent via-cafe-accent/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
            <div class="relative z-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                <h3 class="text-3xl font-serif mb-4">Rigor en cada etapa</h3>
                <p class="text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 leading-relaxed">Cuidamos lo esencial: madurez, fermentación, secado y tostión en su punto exacto.</p>
                <div class="w-12 h-0.5 bg-cafe-light mx-auto mt-6 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>
        </div>

        <!-- Excelencia -->
        <div class="relative group h-[500px] overflow-hidden flex flex-col justify-end p-8 text-center text-white">
            <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Excelencia">
            <div class="absolute inset-0 bg-gradient-to-t from-cafe-secondary via-cafe-secondary/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
            <div class="relative z-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                <h3 class="text-3xl font-serif mb-4">Excelencia en taza</h3>
                <p class="text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 leading-relaxed">Estabilidad sensorial; limpieza y dulzor consistentes en cada lote.</p>
                <div class="w-12 h-0.5 bg-cafe-primary mx-auto mt-6 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>
        </div>

        <!-- Respeto -->
        <div class="relative group h-[500px] overflow-hidden flex flex-col justify-end p-8 text-center text-white">
            <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Respeto">
            <div class="absolute inset-0 bg-gradient-to-t from-cafe-accent via-cafe-accent/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
            <div class="relative z-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                <h3 class="text-3xl font-serif mb-4">Respeto real</h3>
                <p class="text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 leading-relaxed">Compromiso social y ambiental que honran la tierra que nos da origen.</p>
                <div class="w-12 h-0.5 bg-cafe-light mx-auto mt-6 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
            </div>
        </div>
    </div>
</section>

<section id="nuestros-productos" class="section-padding bg-white">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16">
            <div>
                <h2 class="text-4xl md:text-6xl text-cafe-secondary mb-4">Nuestra Selección</h2>
                <p class="text-gray-600 italic">Los favoritos de la temporada, directos de nuestra finca.</p>
            </div>
            <a href="{{ route('shop.index') }}" class="btn-outline mt-8 md:mt-0">VER TODA LA TIENDA</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group">
                <div class="relative h-64 overflow-hidden">
                    @if($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-cafe-secondary/10 flex items-center justify-center text-cafe-secondary/20">
                            <span class="text-5xl">☕</span>
                        </div>
                    @endif
                </div>
                
                <div class="p-6 text-center">
                    <h3 class="text-xl font-serif text-cafe-secondary mb-1">{{ $product->name }}</h3>
                    <p class="text-cafe-primary font-bold mb-4">${{ number_format($product->price, 0, ',', '.') }} COP</p>
                    <a href="{{ route('shop.show', $product->slug) }}" class="text-xs uppercase tracking-widest font-bold text-cafe-secondary hover:text-cafe-primary transition-colors">Ver Producto</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="compromiso" class="section-padding bg-cafe-secondary text-white relative overflow-hidden">
    <!-- Decoración de fondo -->
    <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-cafe-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-cafe-accent/10 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-4 text-center relative z-10">
        <h2 class="text-4xl md:text-6xl mb-6">Nuestro Compromiso Ambiental</h2>
        <p class="max-w-3xl mx-auto text-xl opacity-80 mb-16 italic font-light">Cultivamos y beneficiamos nuestro café con respeto por la tierra y buenas prácticas agrícolas que cuidan el ecosistema.</p>
        
        <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            <div class="group bg-white/5 p-12 rounded-[2rem] border border-white/10 backdrop-blur-md hover:bg-white/10 hover:border-cafe-primary/50 transition-all duration-500 text-center">
                <div class="w-20 h-20 bg-cafe-primary/20 rounded-2xl flex items-center justify-center text-4xl mb-8 mx-auto group-hover:scale-110 transition-transform duration-500">🌳</div>
                <h3 class="text-2xl font-serif mb-4 text-cafe-primary">Cultivo bajo sombra natural</h3>
                <p class="text-gray-400 leading-relaxed font-light">El café se cultiva bajo sombra de plátano y árboles nativos, lo que protege el suelo y regula la temperatura de manera natural.</p>
            </div>
            <div class="group bg-white/5 p-12 rounded-[2rem] border border-white/10 backdrop-blur-md hover:bg-white/10 hover:border-cafe-primary/50 transition-all duration-500 text-center">
                <div class="w-20 h-20 bg-cafe-accent/20 rounded-2xl flex items-center justify-center text-4xl mb-8 mx-auto group-hover:scale-110 transition-transform duration-500">🐦</div>
                <h3 class="text-2xl font-serif mb-4 text-cafe-primary">Conservación del ecosistema</h3>
                <p class="text-gray-400 leading-relaxed font-light">Mantenemos coberturas vivas y corredores biológicos para fomentar la biodiversidad y la salud del territorio.</p>
            </div>
        </div>
    </div>
</section>
@endsection
