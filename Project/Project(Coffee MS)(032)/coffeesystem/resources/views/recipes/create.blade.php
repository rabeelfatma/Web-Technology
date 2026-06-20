@extends('layouts.app')

@section('title', 'Add Recipe')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Recipe</h1>

<form action="{{ route('recipes.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block mb-1">Select Product</label>
        <select name="product_id" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
            <option value="">-- Select Product --</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Ingredients & Quantity</label>
        @foreach($ingredients as $ingredient)
        <div class="flex items-center space-x-2 mb-2">
            <input type="checkbox" name="ingredients[{{ $ingredient->id }}][selected]" value="1" class="w-4 h-4">
            <span class="text-[#f5f5dc]">{{ $ingredient->name }} ({{ $ingredient->unit }})</span>
            <input type="number" step="0.01" name="ingredients[{{ $ingredient->id }}][quantity]" placeholder="Quantity" class="w-24 p-1 rounded bg-[#5a3e2b] text-[#f5f5dc]" disabled>
        </div>
        @endforeach
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Save Recipe</button>
</form>

<script>
document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        const quantityInput = this.parentElement.querySelector('input[type="number"]');
        quantityInput.disabled = !this.checked;
    });
});
</script>
@endsection
