@extends('layouts.app')

@section('title', 'Ingredients')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Ingredients</h1>
    <a href="{{ route('ingredients.create') }}" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Add Ingredient</a>
</div>

<table class="w-full border-collapse border border-[#d2b48c] rounded-lg overflow-hidden shadow-lg">
    <thead class="bg-[#2c1b12] text-[#f5f5dc]">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Unit</th>
            <th class="border px-4 py-2">Stock</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ingredients as $ingredient)
        <tr class="hover:bg-[#4a3220] transition">
            <td class="border px-4 py-2">{{ $ingredient->id }}</td>
            <td class="border px-4 py-2">{{ $ingredient->name }}</td>
            <td class="border px-4 py-2">{{ $ingredient->unit }}</td>
            <td class="border px-4 py-2">{{ $ingredient->stock }}</td>
            <td class="border px-4 py-2 flex space-x-2">
                <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="bg-[#5a3e2b] px-2 py-1 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Edit</a>
                <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST">
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
