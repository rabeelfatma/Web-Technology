@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Category</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Category Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Update Category</button>
</form>
@endsection
