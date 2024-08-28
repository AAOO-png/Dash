@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6">Product List</h1>

        <!-- Tombol Create Product -->
        <a href="{{ route('admin.products.create') }}"
            class="inline-block px-6 py-3 bg-green-600 text-white rounded-md shadow hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Create New Product
        </a>

        <!-- Daftar Produk -->
        <div class="mt-8">
            @if ($products->count())
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">no</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">img</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-gray-700"> {{$loop->iteration}} </td>
                                    <td class="px-6 py-4 text-gray-700">{{ $product->name_product }}</td>
                                    <td class="px-6 py-4 text-gray-700">img </td>
                                    <td class="px-6 py-4 text-gray-500">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-800 mr-4">Edit</a>


                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this product?');"
                                                class="text-red-600 hover:text-red-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">No products available.</p>
            @endif
        </div>
    </div>
@endsection
