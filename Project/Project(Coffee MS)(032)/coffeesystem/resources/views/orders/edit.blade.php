@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Order</h1>

<form action="{{ route('orders.update', $order->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Select Customer</label>
        <select name="customer_id" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }} ({{ $customer->email }})
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Select Products</label>
        <select name="products[]" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" multiple required>
            @foreach($products as $product)
                {{-- FIX: Yahan null-safe operator aur fallback array lagaya gaya hai --}}
                <option value="{{ $product->id }}" 
                    {{ in_array($product->id, $order->products?->pluck('id')->toArray() ?? []) ? 'selected' : '' }}>
                    {{ $product->name }} - ${{ number_format($product->price, 2) }}
                </option>
            @endforeach
        </select>
        <small class="text-[#d2b48c]">Hold Ctrl (Cmd) to select multiple products</small>
    </div>

    {{-- Zaroori Note: Agar aapka 'update' method 'quantities' mangta hai, 
         to yahan quantity ke liye hidden ya input fields honi chahiye --}}

    <div>
        <label class="block mb-1">Order Status</label>
        <select name="status" class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]" required>
            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="In Progress" {{ $order->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>

    <button type="submit" class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">Update Order</button>
</form>
@endsection