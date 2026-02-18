<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear Usuario Admin para Filament
        User::factory()->create([
            'name' => 'Admin Cafe',
            'email' => 'admin@cafe.com',
            'password' => Hash::make('password'),
        ]);

        // Categorías
        $bebidas = Category::create(['name' => 'Bebidas', 'slug' => 'bebidas']);
        $comida = Category::create(['name' => 'Comida', 'slug' => 'comida']);
        $postres = Category::create(['name' => 'Postres', 'slug' => 'postres']);

        // Productos - Bebidas
        Product::create([
            'category_id' => $bebidas->id,
            'name' => 'Café Americano',
            'slug' => 'cafe-americano',
            'description' => 'Café negro clásico preparado con granos de alta calidad.',
            'price' => 5000,
            'stock' => 100,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => $bebidas->id,
            'name' => 'Cappuccino',
            'slug' => 'cappuccino',
            'description' => 'Café con leche espumosa y un toque de canela.',
            'price' => 7500,
            'stock' => 100,
            'is_active' => true,
        ]);

        // Productos - Comida
        Product::create([
            'category_id' => $comida->id,
            'name' => 'Sándwich de Jamón y Queso',
            'slug' => 'sandwich-jamon-queso',
            'description' => 'Sándwich caliente con jamón premium y queso fundido.',
            'price' => 12000,
            'stock' => 50,
            'is_active' => true,
        ]);

        // Productos - Postres
        Product::create([
            'category_id' => $postres->id,
            'name' => 'Cheesecake de Frutos Rojos',
            'slug' => 'cheesecake-frutos-rojos',
            'description' => 'Delicioso postre cremoso con salsa de frutos rojos.',
            'price' => 9000,
            'stock' => 30,
            'is_active' => true,
        ]);
    }
}
