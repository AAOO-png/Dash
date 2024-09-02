@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Add New Brand</h1>
    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Brand Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700">Brand Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
