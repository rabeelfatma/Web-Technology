@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Products</h1>
    <a href="{{ route('products.create') }}" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Add Product</a>
</div>

<table class="w-full border-collapse border border-[#d2b48c] rounded-lg overflow-hidden shadow-lg">
    <thead class="bg-[#2c1b12] text-[#f5f5dc]">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr class="hover:bg-[#4a3220] transition">
            <td class="border px-4 py-2">{{ $product->id }}</td>
            <td class="border px-4 py-2">{{ $product->name }}</td>
            <td class="border px-4 py-2">{{ $product->category->name ?? '-' }}</td>
            <td class="border px-4 py-2">${{ $product->price }}</td>
            <td class="border px-4 py-2">{{ $product->is_active ? 'Active' : 'Inactive' }}</td>
            <td class="border px-4 py-2">
                @if($product->image)
                <img src="{{ asset('images/products/'.$product->image) }}" class="w-16 h-16 rounded-lg shadow-lg">
                @else
                <span class="text-gray-400">No Image</span>
                @endif
            </td>
            <td class="border px-4 py-2 flex space-x-2">
                <a href="{{ route('products.edit', $product->id) }}" class="bg-[#5a3e2b] px-2 py-1 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-[#7b5537] px-2 py-1 rounded hover:bg-[#5a3e2b] transition transform hover:scale-105" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
