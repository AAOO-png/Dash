@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Slug Field -->
            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug:</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Category Dropdown -->
            {{-- <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Category:</label>
                <select id="kategori" name="kategori_id" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @foreach ($kategoris as $kategori)
                          <option value="{{ $kategori->id }}" {{ $product->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                    @endforeach
                </select>
            </div> --}}

            <!-- Image Upload Field -->
            <div class="mb-4">
                <label for="img" class="block text-sm font-medium text-gray-700">Upload Image:</label>
                <input type="file" id="img" name="img"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-medium file:bg-gray-100 hover:file:bg-gray-200">
                @if ($product->img)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/products/' . $product->img) }}" alt="{{ $product->name }}" width="150">
                    </div>
                @endif
            </div>

            <!-- Description Field -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description', $product->description) }}</textarea>
            </div>

            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save Changes
            </button>
        </form>
    </div>
@endsection
