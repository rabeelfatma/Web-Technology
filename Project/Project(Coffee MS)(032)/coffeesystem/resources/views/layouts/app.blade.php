<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Coffee Management System</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-[#3e2c1c] text-[#f5f5dc] font-sans">

    <nav class="bg-[#2c1b12] p-4 shadow-lg flex justify-between items-center sticky top-0 z-50">
        <div class="text-2xl font-bold flex items-center">
            <span class="mr-2 text-[#d2b48c] text-3xl">☕</span> 
            Coffee System
        </div>
        
        <div class="space-x-6 text-lg">
            <a href="{{ route('dashboard') }}" class="hover:text-[#d2b48c] transition duration-300 transform hover:scale-105 flex items-center inline-block">
                <span class="mr-1">🏪</span> Dashboard
            </a>
            
            <a href="{{ route('products.index') }}" class="hover:text-[#d2b48c] transition duration-300 transform hover:scale-105 flex items-center inline-block">
                <span class="mr-1">☕</span> Products
            </a>
            
            <a href="{{ route('categories.index') }}" class="hover:text-[#d2b48c] transition duration-300 transform hover:scale-105 flex items-center inline-block">
                <span class="mr-1">🏷️</span> Categories
            </a>
            
            <a href="{{ route('ingredients.index') }}" class="hover:text-[#d2b48c] transition duration-300 transform hover:scale-105 flex items-center inline-block">
                <span class="mr-1">🥛</span> Ingredients
            </a>
            
            <a href="{{ route('customers.index') }}" class="hover:text-[#d2b48c] transition duration-300 transform hover:scale-105 flex items-center inline-block">
                <span class="mr-1">👥</span> Customers
            </a>
            
            <a href="{{ route('recipes.index') }}" class="hover:text-[#d2b48c] transition duration-300 transform hover:scale-105 flex items-center inline-block">
                <span class="mr-1">📋</span> Recipes
            </a>
            
            <a href="{{ route('orders.index') }}" class="hover:text-[#d2b48c] transition duration-300 transform hover:scale-105 flex items-center inline-block">
                <span class="mr-1">🛒</span> Orders
            </a>
        </div>
    </nav>

    <div class="p-8">
        @yield('content')
    </div>

</body>
</html>