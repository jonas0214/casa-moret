<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class AddToCart extends Component
{
    public $productId;

    public function addToCart()
    {
        $product = Product::findOrFail($this->productId);
        $cart = session()->get('cart', []);

        if(isset($cart[$this->productId])) {
            $cart[$this->productId]['quantity']++;
        } else {
            $cart[$this->productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_path
            ];
        }

        session()->put('cart', $cart);
        $this->dispatch('cart-updated');
        
        session()->flash('message', '¡Producto añadido al carrito!');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
