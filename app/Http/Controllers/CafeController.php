<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)
            ->with('category')
            ->latest()
            ->take(4)
            ->get();
            
        return view('cafe.index', compact('featuredProducts'));
    }
}
