# Plan de Implementación: E-commerce Casa Morêt

Este documento detalla la arquitectura para transformar el sitio actual en una tienda en línea completa.

## 1. Arquitectura de Base de Datos

```mermaid
erDiagram
    CATEGORY ||--o{ PRODUCT : contains
    PRODUCT ||--o{ CART_ITEM : "added to"
    PRODUCT ||--o{ ORDER_ITEM : "ordered in"
    USER ||--o{ ORDER : places
    ORDER ||--o{ ORDER_ITEM : includes
    USER ||--o{ CART_ITEM : has

    PRODUCT {
        bigint id PK
        string name
        string slug
        text description
        decimal price
        integer stock
        string image_path
        boolean is_active
        timestamps
    }

    CATEGORY {
        bigint id PK
        string name
        string slug
        timestamps
    }

    ORDER {
        bigint id PK
        bigint user_id FK
        string order_number
        decimal total_amount
        string status "pending, processing, completed, cancelled"
        string payment_status "unpaid, paid, failed"
        string shipping_address
        timestamps
    }

    ORDER_ITEM {
        bigint id PK
        bigint order_id FK
        bigint product_id FK
        integer quantity
        decimal price_at_time
    }
```

## 2. Componentes Clave

### Panel Administrativo: Laravel Filament
Para el panel de administración, propongo usar **Filament**. Es la herramienta estándar actual para Laravel que nos permitirá:
- Gestionar productos y categorías con una interfaz moderna.
- Ver y procesar pedidos en tiempo real.
- Gestionar usuarios y roles.
- Generar reportes de ventas.

### Carrito de Compras: Livewire
Usaremos **Livewire** para el carrito de compras para que los clientes puedan agregar productos sin recargar la página, manteniendo la fluidez que ya logramos en el diseño actual.

### Pasarela de Pagos
Dependiendo de la ubicación del negocio (Valle del Cauca, Colombia), las mejores opciones son:
1. **Wompi** (Grupo Bancolombia): Integración nativa y confiable.
2. **Mercado Pago**: Muy fácil de configurar.
3. **Stripe**: Si se planea vender internacionalmente.

## 3. Próximos Pasos (Todo List)

1. **Fase 1: Preparación**
   - [ ] Instalar Laravel Filament.
   - [ ] Crear migraciones para Productos, Categorías y Pedidos.
   - [ ] Configurar el sistema de autenticación de usuarios.

2. **Fase 2: Catálogo y Administración**
   - [ ] Desarrollar los Resources en Filament para gestionar el inventario.
   - [ ] Crear la vista de tienda (Grid de productos) en el frontend.
   - [ ] Implementar la página de detalle de producto.

3. **Fase 3: Ventas**
   - [ ] Implementar la lógica del Carrito (Session-based o DB-based).
   - [ ] Crear el flujo de Checkout (Formulario de envío).
   - [ ] Integrar la pasarela de pagos seleccionada.

4. **Fase 4: Post-Venta**
   - [ ] Sistema de notificaciones por correo electrónico (Confirmación de compra).
   - [ ] Panel de usuario para ver historial de pedidos.

---
**¿Deseas que comencemos instalando Filament y configurando la base de datos de productos?**
