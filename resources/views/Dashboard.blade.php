@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    <!-- Main Content -->
    <div class="w-3/4 p-6 bg-gray-100">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-8">Admin Dashboard</h1>

        <!-- Slides Section -->
        <section>
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Slides</h2>
            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead>
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($slides as $slide)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <img src="{{ asset('uploads/' . $slide->image) }}" alt="{{ $slide->name_image }}" class="w-24 h-24 object-cover">
                            </td>
                            <td class="py-4 px-6 text-gray-900">
                                {{ $slide->name_image }}
                            </td>
                            <td class="py-4 px-6 text-gray-700">
                                {{ $slide->description }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <!-- Products Section -->
        <section class="mt-12">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Products</h2>
            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead>
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}" class="w-24 h-24 object-cover">
                            </td>
                            <td class="py-4 px-6 text-gray-900">
                                {{ $product->name }}
                            </td>
                            <td class="py-4 px-6 text-gray-700">
                                {{ $product->description }}
                            </td>
                            <td class="py-4 px-6 text-green-500">
                                ${{ $product->price }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection

