@extends('layouts.app')

@section('title', 'Edit Ingredient')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Ingredient</h1>

<form action="{{ route('ingredients.update', $ingredient->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Name</label>
        <input type="text" name="name" value="{{ old('name', $ingredient->name) }}" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <div>
        <label class="block mb-1">Unit</label>
        <input type="text" name="unit" value="{{ old('unit', $ingredient->unit) }}" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <div>
        <label class="block mb-1">Stock</label>
        <input type="number" name="stock" step="0.01" value="{{ old('stock', $ingredient->stock) }}" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Update Ingredient</button>
</form>
@endsection
