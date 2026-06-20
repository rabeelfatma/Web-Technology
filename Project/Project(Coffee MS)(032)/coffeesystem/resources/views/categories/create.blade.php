@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Category</h1>

<form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block mb-1">Category Name</label>
        <input type="text" name="name" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" placeholder="Enter category name" required>
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Save Category</button>
</form>
@endsection
