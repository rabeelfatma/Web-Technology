@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Orders</h1>
    <a href="{{ route('orders.create') }}"
       class="bg-[#5a3e2b] px-4 py-2 rounded hover:bg-[#7b5537] transition transform hover:scale-105">
        Create Order
    </a>
</div>

<table class="w-full border-collapse border border-[#d2b48c] rounded-lg overflow-hidden shadow-lg">
    <thead class="bg-[#2c1b12] text-[#f5f5dc]">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Customer</th>
            <th class="border px-4 py-2">Total Price</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $order)
        <tr class="hover:bg-[#4a3220] transition">
            <td class="border px-4 py-2">{{ $order->id }}</td>

            <td class="border px-4 py-2">
                {{ $order->customer?->name ?? 'No Customer' }}
            </td>

            <td class="border px-4 py-2">
                ${{ number_format($order->total_price, 2) }}
            </td>

            <td class="border px-4 py-2">
                {{ $order->status }}
            </td>

            <td class="border px-4 py-2 flex space-x-2">
                <a href="{{ route('orders.edit', $order->id) }}"
                   class="bg-[#5a3e2b] px-2 py-1 rounded hover:bg-[#7b5537] transition transform hover:scale-105">
                    Edit
                </a>

                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="bg-[#7b5537] px-2 py-1 rounded hover:bg-[#5a3e2b] transition transform hover:scale-105"
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="border px-4 py-4 text-center">
                No orders found.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection