@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Brand</h1>
    <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Brand Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ $brand->name }}" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Brand Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
            @if($brand->image)
                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="w-32 h-32 mt-4">
            @endif
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" name="description" class="summernote">{{ old('description', $brand->description) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote-lite/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#description').summernote({
            height: 200
        });
     });
</script>
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote-lite/dist/summernote-lite.min.css" rel="stylesheet">
@endsection