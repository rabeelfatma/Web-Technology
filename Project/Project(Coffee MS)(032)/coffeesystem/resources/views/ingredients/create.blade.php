@extends('layouts.app')

@section('title', 'Add Ingredient')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Ingredient</h1>

<form action="{{ route('ingredients.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
    @csrf

    <div>
        <label class="block mb-1">Name</label>
        <input type="text" name="name" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" placeholder="Enter ingredient name" required>
    </div>

    <div>
        <label class="block mb-1">Unit (e.g., g, ml)</label>
        <input type="text" name="unit" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" placeholder="Enter unit" required>
    </div>

    <div>
        <label class="block mb-1">Stock</label>
        <input type="number" name="stock" step="0.01" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" placeholder="Enter stock quantity" required>
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Save Ingredient</button>
</form>
@endsection
