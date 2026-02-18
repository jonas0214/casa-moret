import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('main-header');
    const nav = header.querySelector('nav');
    const links = header.querySelectorAll('ul li a');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    // const logo = header.querySelector('.logo img');

    // Función para manejar el scroll
    function handleScroll() {
        if (window.scrollY > 50) {
            header.classList.remove('bg-transparent', 'text-white');
            header.classList.add('bg-white', 'shadow-md', 'py-2');
            nav.classList.remove('py-4');
            nav.classList.add('py-2');
            
            // Ajustar colores de enlaces
            links.forEach(link => {
                link.classList.remove('text-white');
                link.classList.add('text-cafe-secondary');
            });
        } else {
            header.classList.add('bg-transparent');
            header.classList.remove('bg-white', 'shadow-md', 'py-2');
            header.classList.add('text-white'); // Asegurar texto blanco en estado transparente
            nav.classList.add('py-4');
            nav.classList.remove('py-2');

            links.forEach(link => {
                link.classList.add('text-white');
                link.classList.remove('text-cafe-secondary');
            });
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Ejecutar al cargar
});
