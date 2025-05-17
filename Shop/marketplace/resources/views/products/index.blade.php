@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <!-- Header Section -->
        <div class="flex justify-between items-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-lg shadow-md mb-8">
            <h1 class="text-3xl font-extrabold tracking-tight">Admin Product</h1>
            <a href="{{ route('products.create') }}" class="flex items-center bg-white text-blue-600 px-5 py-2.5 rounded-lg shadow-lg hover:scale-105 transition-transform">
                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Product
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 border-l-4 border-green-500 p-4 rounded-lg mb-6 shadow">
                {{ session('success') }}
            </div>
        @endif

        <!-- Product Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase">ID</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase">Product</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase">Category</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase">Price</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $product->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $product->category->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">$. {{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-4">
                                    <a href="{{ route('products.edit', $product->id) }}" class="flex items-center text-indigo-600 hover:text-indigo-800 transition">
                                        <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0v6m0-6V6" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center text-red-600 hover:text-red-800 transition" onclick="return confirm('Are you sure?')">
                                            <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
