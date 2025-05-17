@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <!-- Header Section -->
        <div class="flex justify-between items-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-lg shadow-md mb-8">
            <h1 class="text-3xl font-extrabold tracking-tight">Add New Product</h1>
        </div>

        <!-- Form Section -->
        <form action="{{ route('products.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-8 space-y-6">
            @csrf

            <!-- Product Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-800 mb-2">Product Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 focus:outline-none"
                    placeholder="Enter product name"
                    value="{{ old('name') }}">
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-semibold text-gray-800 mb-2">Price</label>
                <input 
                    type="number" 
                    name="price" 
                    id="price" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 focus:outline-none"
                    placeholder="Enter price"
                    value="{{ old('price') }}">
            </div>

            <!-- Stock -->
            <div>
                <label for="stock" class="block text-sm font-semibold text-gray-800 mb-2">Stock</label>
                <input 
                    type="number" 
                    name="stock" 
                    id="stock" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 focus:outline-none"
                    placeholder="Enter stock quantity"
                    value="{{ old('stock') }}">
            </div>

            <!-- Category -->
            <div>
                <label for="category_id" class="block text-sm font-semibold text-gray-800 mb-2">Category</label>
                <select 
                    name="category_id" 
                    id="category_id" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 focus:outline-none">
                    <option value="" disabled selected>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center">
                <a href="{{ route('products.index') }}" 
                   class="flex items-center bg-gray-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-gray-600 focus:ring focus:ring-gray-400 transition-transform transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back
                </a>
                <button 
                    type="submit" 
                    class="flex items-center bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 focus:ring focus:ring-blue-400 transition-transform transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
