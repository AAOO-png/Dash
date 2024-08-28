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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($slides as $slide)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('uploads/' . $slide->image) }}" alt="{{ $slide->title }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900">{{ $slide->name_image }}</h3>
                            <p class="text-gray-700 mt-2">{{ $slide->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Products Section -->
        <section class="mt-12">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900">{{ $product->name }}</h3>
                            <p class="text-gray-700 mt-2">{{ $product->description }}</p>
                            <p class="text-lg font-semibold text-green-500 mt-4">Price: ${{ $product->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
