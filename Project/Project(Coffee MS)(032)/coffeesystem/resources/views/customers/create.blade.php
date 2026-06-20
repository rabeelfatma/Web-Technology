@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Customer</h1>

<form action="{{ route('customers.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block mb-1">Name</label>
        <input type="text" name="name" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" placeholder="Enter customer name" required>
    </div>

    <div>
        <label class="block mb-1">Email</label>
        <input type="email" name="email" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" placeholder="Enter email" required>
    </div>

    <div>
        <label class="block mb-1">Phone</label>
        <input type="text" name="phone" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" placeholder="Enter phone number" required>
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Save Customer</button>
</form>
@endsection
