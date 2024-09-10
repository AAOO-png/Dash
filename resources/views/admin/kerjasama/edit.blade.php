@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Kerjasama</h1>

    <form action="{{ route('admin.kerjasama.update', $logo->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name_img" class="block text-sm font-medium text-gray-700">Name Image:</label>
            <input type="text" id="name_img" name="name_img" value="{{ old('name_img', $logo->name_img) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div class="mb-4">
            <label for="img" class="block text-sm font-medium text-gray-700">Upload New Image (optional):</label>
            <input type="file" id="img" name="img" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-medium file:bg-gray-100 hover:file:bg-gray-200">
            @if ($logo->img)
                <img src="{{ asset('uploads/kerjasama/' . $logo->img) }}" alt="Current Image" class="mt-2 w-48 h-48">
            @endif
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" class="summernote">{{ old('description', $logo->description) }}</textarea>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
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
