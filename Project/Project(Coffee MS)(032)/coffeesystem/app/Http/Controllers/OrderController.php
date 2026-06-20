<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        // Yahan 'with' ke sath 'orderItems.product' zaroori hai takay total_price accessor sahi chale
        $orders = Order::with(['customer', 'orderItems.product'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view('orders.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required|array|min:1',
            'products.*' => 'required|exists:products,id',
            'quantities' => 'required|array|min:1',
        ]);

        DB::beginTransaction();

        try {

            $totalAmount = 0;

            // FIX: quantities ab product_id se key hoti hain, index se nahi
            foreach ($request->products as $product_id) {
                $product = Product::findOrFail($product_id);
                $quantity = $request->quantities[$product_id] ?? 1;

                $totalAmount += $product->price * $quantity;
            }

            $order = Order::create([
                'customer_id' => $request->customer_id,
                'status' => $request->status ?? 'Pending',
                'total_amount' => $totalAmount,
            ]);

            foreach ($request->products as $product_id) {
                $product = Product::findOrFail($product_id);
                $quantity = $request->quantities[$product_id] ?? 1;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
            }

            DB::commit();

            return redirect()->route('orders.index')
                ->with('success', 'Order created successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(Order $order)
    {
        // Relationship load ki taake pluck() error na aaye
        $order->load('products');

        $customers = Customer::all();
        $products = Product::all();
        $orderItems = $order->orderItems;

        return view('orders.edit', compact('order', 'customers', 'products', 'orderItems'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required|array|min:1',
            'products.*' => 'required|exists:products,id',
            'quantities' => 'required|array|min:1',
            'status' => 'required|in:Pending,In Progress,Completed,Cancelled',
        ]);

        DB::beginTransaction();

        try {

            $totalAmount = 0;

            // FIX: quantities ab product_id se key hoti hain, index se nahi
            foreach ($request->products as $product_id) {
                $product = Product::findOrFail($product_id);
                $quantity = $request->quantities[$product_id] ?? 1;

                $totalAmount += $product->price * $quantity;
            }

            $order->update([
                'customer_id' => $request->customer_id,
                'status' => $request->status,
                'total_amount' => $totalAmount,
            ]);

            $order->orderItems()->delete();

            foreach ($request->products as $product_id) {
                $product = Product::findOrFail($product_id);
                $quantity = $request->quantities[$product_id] ?? 1;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
            }

            DB::commit();

            return redirect()->route('orders.index')
                ->with('success', 'Order updated successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Order $order)
    {
        $order->orderItems()->delete();
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}