@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <div>
        <label class="block mb-1">Category</label>
        <select name="category_id" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Description</label>
        <textarea name="description" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]">{{ old('description', $product->description) }}</textarea>
    </div>

    <div>
        <label class="block mb-1">Price</label>
        <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <div>
        <label class="block mb-1">Status</label>
        <select name="is_active" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
            <option value="1" {{ $product->is_active ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div>
        <label class="block mb-1">Product Image</label>
        @if($product->image)
            <img src="{{ asset('images/products/'.$product->image) }}" class="w-24 h-24 mb-2 rounded shadow-lg">
        @endif
        <input type="file" name="image" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]">
        <small>Upload new image to replace existing one</small>
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Update Product</button>
</form>
@endsection
