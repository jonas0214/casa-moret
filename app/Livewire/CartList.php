<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CartList extends Component
{
    public $cart = [];
    public $total = 0;

    public function mount()
    {
        $this->updateCart();
    }

    #[On('cart-updated')]
    public function updateCart()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = array_reduce($this->cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $this->dispatch('cart-updated');
        }
    }

    public function updateQuantity($productId, $quantity)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$productId]) && $quantity > 0) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            $this->dispatch('cart-updated');
        }
    }

    public function render()
    {
        return view('livewire.cart-list');
    }
}
