# Proyecto Cafe - E-commerce

Este es un proyecto de E-commerce para un Café, desarrollado con **Laravel 11**, **Filament PHP** (para el panel administrativo) y **Livewire**.

## Tecnologías utilizadas
- **Backend:** Laravel 11
- **Panel Administrativo:** Filament PHP v3
- **Frontend Dinámico:** Livewire
- **Estilos:** Tailwind CSS
- **Base de Datos:** MySQL

## Requisitos previos
- PHP 8.2 o superior
- Composer
- Node.js & NPM
- MySQL

## Instalación

1. Clonar el repositorio:
   ```bash
   git clone [url-del-repositorio]
   cd Cafe
   ```

2. Instalar dependencias de PHP:
   ```bash
   composer install
   ```

3. Instalar dependencias de JS y compilar assets:
   ```bash
   npm install
   npm run dev
   ```

4. Configurar el entorno:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Configurar la base de datos en el archivo `.env` y ejecutar migraciones:
   ```bash
   php artisan migrate
   ```

## Características
- Gestión de Categorías y Productos con Filament.
- Carrito de compras funcional con Livewire.
- Integración con pasarela de pagos (Wompi).
- Diseño responsivo con Tailwind CSS.
