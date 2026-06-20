@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
<h1 class="text-2xl font-bold mb-4">Create Order</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('orders.store') }}" method="POST" class="space-y-4">
    @csrf

    <!-- Customer -->
    <div>
        <label class="block mb-1">Select Customer</label>
        <select name="customer_id"
                class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]"
                required>
            <option value="">-- Select Customer --</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">
                    {{ $customer->name }} ({{ $customer->email }})
                </option>
            @endforeach
        </select>
    </div>

    <!-- PRODUCTS + QUANTITY (FIXED: quantity keyed by product id) -->
    <div>
        <label class="block mb-1">Select Products & Quantity</label>

        @foreach($products as $product)
            <div class="flex items-center gap-3 mb-2">

                <!-- Product checkbox -->
                <input type="checkbox" name="products[]" value="{{ $product->id }}">

                <span class="w-48">
                    {{ $product->name }} - ${{ number_format($product->price,2) }}
                </span>

                <!-- Quantity keyed by product id, NOT index -->
                <input type="number"
                       name="quantities[{{ $product->id }}]"
                       min="1"
                       value="1"
                       class="w-20 p-1 rounded bg-[#5a3e2b] text-[#f5f5dc]">

            </div>
        @endforeach
    </div>

    <!-- Status -->
    <div>
        <label class="block mb-1">Order Status</label>
        <select name="status"
                class="w-full p-2 rounded bg-[#5a3e2b] text-[#f5f5dc]"
                required>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
            <option value="Cancelled">Cancelled</option>
        </select>
    </div>

    <button type="submit"
            class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">
        Create Order
    </button>

</form>
@endsection