@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Recipes</h1>
    <a href="{{ route('recipes.create') }}" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Add Recipe</a>
</div>

<table class="w-full border-collapse border border-[#d2b48c] rounded-lg overflow-hidden shadow-lg">
    <thead class="bg-[#2c1b12] text-[#f5f5dc]">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Product</th>
            <th class="border px-4 py-2">Ingredients</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recipes as $recipe)
        <tr class="hover:bg-[#4a3220] transition">
            <td class="border px-4 py-2">{{ $recipe->id }}</td>
            <td class="border px-4 py-2">{{ $recipe->product->name }}</td>
            <td class="border px-4 py-2">
                @foreach($recipe->recipeItems as $item)
                    {{ $item->ingredient->name }} ({{ $item->quantity_used }} {{ $item->ingredient->unit }})<br>
                @endforeach
            </td>
            <td class="border px-4 py-2 flex space-x-2">
                <a href="{{ route('recipes.edit', $recipe->id) }}" class="bg-[#5a3e2b] px-2 py-1 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Edit</a>
                <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
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
