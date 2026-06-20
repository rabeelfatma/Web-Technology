@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Customers</h1>
    <a href="{{ route('customers.create') }}" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Add Customer</a>
</div>

<table class="w-full border-collapse border border-[#d2b48c] rounded-lg overflow-hidden shadow-lg">
    <thead class="bg-[#2c1b12] text-[#f5f5dc]">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Phone</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr class="hover:bg-[#4a3220] transition">
            <td class="border px-4 py-2">{{ $customer->id }}</td>
            <td class="border px-4 py-2">{{ $customer->name }}</td>
            <td class="border px-4 py-2">{{ $customer->email }}</td>
            <td class="border px-4 py-2">{{ $customer->phone }}</td>
            <td class="border px-4 py-2 flex space-x-2">
                <a href="{{ route('customers.edit', $customer->id) }}" class="bg-[#5a3e2b] px-2 py-1 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Edit</a>
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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
