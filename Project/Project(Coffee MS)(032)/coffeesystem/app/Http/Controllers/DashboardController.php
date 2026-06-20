<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics and top selling products.
     */
    public function index()
    {
        // Total counts
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();
        // Fixed: All orders count
        $totalOrders = Order::count();

        // Top 5 selling products
        $topProducts = Product::withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->take(5)
            ->pluck('name');

        $topSales = Product::withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->take(5)
            ->pluck('order_items_count');

        return view('dashboard', [
            'totalProducts' => $totalProducts,
            'totalCustomers' => $totalCustomers,
            'totalOrders' => $totalOrders,
            'topProducts' => $topProducts,
            'topSales' => $topSales,
        ]);
    }
}