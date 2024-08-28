@extends('layouts.app')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<style>
    select {
        scrollbar-width: none;
    }

    trix-editor {
        scrollbar-width: none;
    }
</style>

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Kerjasama</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.kerjasama.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="name_img" class="block text-sm font-medium text-gray-700">Name Image:</label>
                <input type="text" id="name_img" name="name_img" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="img" class="block text-sm font-medium text-gray-700">Upload Image:</label>
                <input type="file" id="img" name="img" required
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-medium file:bg-gray-100 hover:file:bg-gray-200">
            </div>

            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Submit
            </button>
        </form>

        @if ($logos->isEmpty())
            <p class="text-gray-500">Tidak Ada Gambar.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($logos as $logo)
                    <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                        <img src="{{ asset('uploads/kerjasama/' . $logo->image) }}" alt="Logo Kerjasama"
                            class="w-48 h-48 mb-4">

                        <div class="mt-4 flex items-center space-x-4">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.kerjasama.edit', $logo->id) }}" class="text-indigo-600 hover:text-indigo-800">
                                Edit
                            </a>
                            

                            {{-- <Form to toggle publish (optional, if applicable) -->
                             <form action="{{ route('admin.kerjasama.toggle', $logo->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <label class="toggle-switch">
                            <input type="checkbox" name="is_publish" onchange="this.form.submit()" {{ $logo->is_publish ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                    </form>  --}}

                            <!-- Form to delete the logo -->
                            <form action="{{ route('admin.kerjasama.destroy', $logo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah anda ingin menghapusnya?');"
                                    class="bg-red-500 text-white px-4 py-2 rounded">Delete Gambar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif


    </div>
@endsection
