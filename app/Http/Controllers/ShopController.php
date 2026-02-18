<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->with('category')->latest()->get();
        $categories = Category::all();
        
        return view('shop.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        if (!$product->is_active) {
            abort(404);
        }
        
        return view('shop.show', compact('product'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'doc_type' => 'required',
            'doc_number' => 'required',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index');
        }

        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $orderNumber = 'ORD-' . strtoupper(\Illuminate\Support\Str::random(10));

        \Illuminate\Support\Facades\DB::transaction(function () use ($request, $orderNumber, $total, $cart) {
            $order = \App\Models\Order::create([
                'user_id' => auth()->id(),
                'order_number' => $orderNumber,
                'total_amount' => $total,
                'status' => 'pending',
                'payment_status' => 'unpaid',
                'shipping_address' => "{$request->address}, {$request->city}",
                'customer_name' => $request->name,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'doc_type' => $request->doc_type,
                'doc_number' => $request->doc_number,
            ]);

            foreach ($cart as $productId => $item) {
                // Verificar que el producto exista para evitar fallos de integridad
                if (\App\Models\Product::find($productId)) {
                    \App\Models\OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'quantity' => $item['quantity'],
                        'price_at_time' => $item['price'],
                    ]);
                }
            }
        });

        session()->forget('cart');

        return view('shop.checkout_redirect', [
            'orderNumber' => $orderNumber,
            'total' => (int)$total,
            'customer' => $request->all()
        ]);
    }
}
