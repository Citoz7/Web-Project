@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <!-- Header Section -->
        <div class="flex justify-between items-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-lg shadow-md mb-8">
            <h1 class="text-3xl font-extrabold tracking-tight">Edit Product</h1>
        </div>

        <!-- Form Section -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="bg-white shadow-lg rounded-lg p-8">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="name" class="block text-gray-800 font-semibold mb-2">Product Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-shadow" 
                    value="{{ old('name', $product->name) }}">
            </div>

            <div class="mb-6">
                <label for="price" class="block text-gray-800 font-semibold mb-2">Price</label>
                <input 
                    type="number" 
                    name="price" 
                    id="price" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-shadow" 
                    value="{{ old('price', $product->price) }}">
            </div>

            <div class="mb-6">
                <label for="stock" class="block text-gray-800 font-semibold mb-2">Stock</label>
                <input 
                    type="number" 
                    name="stock" 
                    id="stock" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-shadow" 
                    value="{{ old('stock', $product->stock) }}">
            </div>

            <div class="mb-6">
                <label for="category_id" class="block text-gray-800 font-semibold mb-2">Category</label>
                <select 
                    name="category_id" 
                    id="category_id" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-shadow">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('products.index') }}" 
                   class="flex items-center bg-gray-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-700 focus:ring focus:ring-gray-400 transition-transform transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back
                </a>
                <button 
                    type="submit" 
                    class="flex items-center bg-yellow-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-600 focus:ring focus:ring-yellow-400 transition-transform transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
