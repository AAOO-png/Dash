@extends('layouts.app')

@section('content')
    <style>
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            border-radius: 50%;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
    </style>

    <div class="container mx-auto px-4 py-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data"
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

            <div class="mb-4">
                <label for="is_publish" class="block text-sm font-medium text-gray-700">Publish:</label>
                <label class="toggle-switch">
                    <input type="checkbox" id="is_publish" name="is_publish">
                    <span class="slider"></span>
                </label>
            </div>

            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Submit
            </button>
        </form>

        @if ($slides->isEmpty())
            <p class="mt-4 text-gray-500">No sliders available.</p>
        @else
            <div class="mt-6 space-y-4">
                @foreach ($slides as $slider)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $slider->name_img }}</h2>
                        @if ($slider->img)
                            <img src="{{ asset('uploads/' . $slider->img) }}" alt="{{ $slider->name_img }}"
                                class="mt-2 rounded-lg" width="200">
                        @else
                            <p class="mt-2 text-gray-500">No image available.</p>
                        @endif

                        <div class="mt-4 flex items-center space-x-4">
                            <form action="{{ route('testZone.toggle', $slider->id) }}" method="POST"
                                class="display:inline">
                                @csrf
                                @method('PATCH')
                                <label class="toggle-switch">
                                    <input type="checkbox" name="is_publish" onchange="this.form.submit()"
                                        {{ $slider->is_publish ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </form>

                            <a href="{{ route('testZone.edit', $slider->id) }}"
                                class="text-indigo-600 hover:text-indigo-800">Edit</a>

                            <form action="{{ route('testZone.destroy', $slider->id) }}" method="POST"
                                class="flex items-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this slider?');"
                                    class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection
