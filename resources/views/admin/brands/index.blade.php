@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Brands</h1>
    <a href="{{ route('brands.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Brand</a>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        @foreach($brands as $brand)
            <div class="p-4 border rounded-lg shadow-md bg-white">
                @if($brand->image)
                    <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="w-full h-48 object-cover mb-4 rounded">
                @endif
                <h3 class="text-xl font-bold mb-2">{{ $brand->name }}</h3>
                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('brands.edit', $brand->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
