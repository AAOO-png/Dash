@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Products</h1>
    <div class="flex overflow-x-auto space-x-4">
        @foreach($products as $product)
            <div class="flex-none w-64 p-4 border rounded-lg shadow-md bg-white">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
                <h3 class="text-xl font-bold mb-2">{{ $product->name }}</h3>
                <p class="text-gray-700 mb-2">{{ $product->description }}</p>
                <p class="font-semibold text-green-600">Rp:{{ $product->price }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection