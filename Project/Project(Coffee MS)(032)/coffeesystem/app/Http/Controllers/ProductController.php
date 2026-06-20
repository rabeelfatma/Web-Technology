<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $request->file('image') 
            ? $request->file('image')->store('products', 'public') 
            : null;

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'is_active' => 1,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // Show edit form
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $product->image; // Purani image default mein rakhi

        if ($request->hasFile('image')) {
            // Purani image delete karein
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // Nayi image store karein
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // FIX: imagePath ko update array mein pass kiya gaya hai
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath, 
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}