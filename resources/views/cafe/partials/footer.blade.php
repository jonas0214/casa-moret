<footer class="bg-cafe-secondary text-gray-400 py-20 border-t border-white/5">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16 text-center md:text-left items-start">
            <!-- Brand -->
            <div class="space-y-6">
                <a href="#inicio" class="text-3xl font-serif font-bold text-cafe-primary tracking-tighter block">CASA MORÊT</a>
                <p class="text-sm leading-relaxed max-w-xs mx-auto md:mx-0">
                    Café de especialidad con rigor técnico y respeto real por el origen. San Antonio – Sevilla, Valle del Cauca.
                </p>
            </div>

            <!-- Links -->
            <div class="space-y-6">
                <h4 class="text-white font-semibold uppercase tracking-widest text-xs">Navegación</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#inicio" class="hover:text-cafe-primary transition-colors">Inicio</a></li>
                    <li><a href="#nuestro-cafe" class="hover:text-cafe-primary transition-colors">Nuestro Café</a></li>
                    <li><a href="#productos" class="hover:text-cafe-primary transition-colors">Productos</a></li>
                    <li><a href="#contacto" class="hover:text-cafe-primary transition-colors">Contacto</a></li>
                </ul>
            </div>

            <!-- Redes -->
            <div class="space-y-6">
                <h4 class="text-white font-semibold uppercase tracking-widest text-xs">Síguenos</h4>
                <div class="flex justify-center md:justify-start space-x-6">
                    <a href="#" class="hover:text-cafe-primary transition-colors">Instagram</a>
                    <a href="#" class="hover:text-cafe-primary transition-colors">Facebook</a>
                    <a href="#" class="hover:text-cafe-primary transition-colors">LinkedIn</a>
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-xs">&copy; {{ date('Y') }} Casa Morêt. Todos los derechos reservados.</p>
            <div class="flex items-center space-x-2 text-xs">
                <span class="w-1 h-1 bg-cafe-primary rounded-full"></span>
                <span>Procesado con disciplina</span>
            </div>
        </div>
    </div>
</footer>

<!-- Botón de WhatsApp Flotante -->
<a href="https://wa.me/yournumber" class="fixed bottom-8 right-8 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 group" target="_blank">
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.067 2.875 1.215 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.445 0 .081 5.391.079 11.99c0 2.108.544 4.166 1.574 5.961L0 24l6.15-1.612a11.826 11.826 0 005.892 1.569h.005c6.604 0 11.971-5.391 11.974-11.991a11.854 11.854 0 00-3.391-8.431z"/></svg>
    <span class="absolute right-full mr-4 bg-white text-cafe-secondary px-4 py-2 rounded-lg text-xs font-bold opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap shadow-xl">¿Necesitas ayuda?</span>
</a>
