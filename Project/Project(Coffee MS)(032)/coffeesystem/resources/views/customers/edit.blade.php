@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Customer</h1>

<form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Name</label>
        <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <div>
        <label class="block mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <div>
        <label class="block mb-1">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Update Customer</button>
</form>
@endsection
