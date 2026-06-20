@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Product</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label class="block mb-1">Name</label>
        <input type="text" name="name" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <div>
        <label class="block mb-1">Category</label>
        <select name="category_id" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Description</label>
        <textarea name="description" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]"></textarea>
    </div>

    <div>
        <label class="block mb-1">Price</label>
        <input type="number" name="price" step="0.01" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <div>
        <label class="block mb-1">Status</label>
        <select name="is_active" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <div>
        <label class="block mb-1">Product Image</label>
        <input type="file" name="image" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]">
        <small>Upload image in <strong>public/images/products/</strong></small>
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Save Product</button>
</form>
@endsection
