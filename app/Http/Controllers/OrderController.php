<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ]);

        $product = Product::find($validated['product_id']);
        $totalPrice = $product->price * $validated['quantity'];

        Order::create([
            'customer_name' => $validated['customer_name'],
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'comment' => $validated['comment'],
        ]);

        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,completed',
        ]);

        $order->update($validated);
        return redirect()->route('orders.index');
    }
}
