@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-4xl font-extrabold mb-8 text-[#d2b48c] flex items-center">
    <span class="mr-3 text-5xl">☕</span> Coffee Shop Dashboard
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    
    <div class="bg-[#5a3e2b] p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-105 cursor-pointer">
        <h2 class="text-xl font-semibold flex items-center mb-2">
            <span class="mr-2 text-2xl text-[#d2b48c]">☕</span> Total Products
        </h2>
        <p class="text-4xl font-bold mt-2 text-white">{{ $totalProducts }}</p>
    </div>
    
    <div class="bg-[#5a3e2b] p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-105 cursor-pointer">
        <h2 class="text-xl font-semibold flex items-center mb-2">
            <span class="mr-2 text-2xl text-white">👥</span> Total Customers
        </h2>
        <p class="text-4xl font-bold mt-2 text-white">{{ $totalCustomers }}</p>
    </div>
    
    <div class="bg-[#5a3e2b] p-6 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-105 cursor-pointer">
        <h2 class="text-xl font-semibold flex items-center mb-2">
            <span class="mr-2 text-2xl text-[#d2b48c]">🧾</span> Total Orders
        </h2>
        <p class="text-4xl font-bold mt-2 text-white">{{ $totalOrders }}</p>
    </div>

</div>

<div class="bg-[#5a3e2b] p-6 rounded-lg shadow-xl mt-8">
    <h2 class="text-2xl font-bold mb-4 flex items-center text-[#d2b48c]">
        <span class="mr-2 text-3xl">🏆</span> Top Selling Products
    </h2>
    <canvas id="salesChart" class="bg-[#3e2c1c] p-4 rounded"></canvas>
</div>


<script>
    // --- Chart Logic remains the same ---
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($topProducts),
            datasets: [{
                label: 'Sold Quantity',
                data: @json($topSales),
                backgroundColor: '#d2b48c',
                hoverBackgroundColor: '#a88863',
                borderColor: '#3e2c1c',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            aspectRatio: 2.5,
            plugins: {
                legend: {
                    labels: { color: '#f5f5dc' }
                }
            },
            scales: {
                x: {
                    ticks: { color: '#f5f5dc' },
                    grid: { color: 'rgba(123, 85, 55, 0.4)' },
                    title: {
                        display: true,
                        text: 'Product Name',
                        color: '#d2b48c'
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: '#f5f5dc' },
                    grid: { color: 'rgba(123, 85, 55, 0.4)' },
                    title: {
                        display: true,
                        text: 'Quantity Sold',
                        color: '#d2b48c'
                    }
                }
            }
        }
    });
</script>
@endsection