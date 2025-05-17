@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    <!-- Header Section -->
    <div class="flex justify-between items-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-lg shadow-md mb-8">
        <h1 class="text-3xl font-extrabold tracking-tight">My Purchasements</h1>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-blue-100 text-blue-800 border-l-4 border-blue-500 p-4 rounded-lg mb-6 shadow">
        {{ session('success') }}
    </div>
    @endif

    <!-- Order Table -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase">No</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase">Product</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase">Jumlah</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase">Date</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($orders as $order)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $order->product }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $order->total_order }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $order->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 shadow-sm"
                                onclick="return confirm('Are you sure?')">
                                Batal Pesanan
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
