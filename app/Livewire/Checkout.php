<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Checkout extends Component
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $doc_type = 'CC';
    public $doc_number;
    public $cart = [];
    public $total = 0;

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'doc_type' => 'required',
        'doc_number' => 'required|min:5',
    ];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
        if (empty($this->cart)) {
            return redirect()->route('shop.index');
        }
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = array_reduce($this->cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }

    public function placeOrder()
    {
        \Log::info('Inicio de placeOrder');
        $this->validate();
        \Log::info('Validación exitosa');

        try {
            $orderNumber = 'ORD-' . strtoupper(Str::random(10));

            $order = DB::transaction(function () use ($orderNumber) {
                $o = Order::create([
                    'user_id' => auth()->id(),
                    'order_number' => $orderNumber,
                    'total_amount' => $this->total,
                    'status' => 'pending',
                    'payment_status' => 'unpaid',
                    'shipping_address' => "{$this->address}, {$this->city}",
                    'customer_name' => $this->name,
                    'customer_email' => $this->email,
                    'customer_phone' => $this->phone,
                    'doc_type' => $this->doc_type,
                    'doc_number' => $this->doc_number,
                ]);

                foreach ($this->cart as $productId => $item) {
                    OrderItem::create([
                        'order_id' => $o->id,
                        'product_id' => $productId,
                        'quantity' => $item['quantity'],
                        'price_at_time' => $item['price'],
                    ]);
                }
                return $o;
            });

            \Log::info('Pedido creado en DB: ' . $order->order_number);

            $customerData = [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'doc_type' => $this->doc_type,
                'doc_number' => $this->doc_number,
            ];

            \Log::info('Redirigiendo a pasarela con datos:', [
                'orderNumber' => $order->order_number,
                'total' => $this->total,
                'customer' => $customerData
            ]);

            session()->put('checkout_data', [
                'orderNumber' => $order->order_number,
                'total' => $this->total,
                'customer' => $customerData
            ]);

            return redirect()->route('shop.checkout.redirect');

        } catch (\Exception $e) {
            \Log::error('CRITICAL CHECKOUT ERROR: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
