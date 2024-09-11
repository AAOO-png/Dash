@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Brands</h1>
    
    <!-- Toggle between Grid and Table Views -->
    <div class="mb-6">
        <button id="view-grid" class="bg-blue-500 text-white px-4 py-2 rounded">Grid View</button>
        <button id="view-table" class="bg-blue-500 text-white px-4 py-2 rounded">Table View</button>
    </div>
    
    <!-- Create Brand Button -->
    <a href="{{ route('admin.brands.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-6 inline-block">Add New Brand</a>

    <!-- Grid View -->
    <div id="grid-view" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 hidden">
        @foreach($brands as $brand)
            <div class="p-4 border rounded-lg shadow-md bg-white">
                @if($brand->image)
                    <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="w-full h-48 object-cover mb-4 rounded">
                @endif
                <h3 class="text-xl font-bold mb-2">{{ $brand->name }}</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.brands.edit', $brand->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Table View -->
    <div id="table-view" class="hidden">
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Image</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $brand->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if($brand->image)
                            <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="w-16 h-16">
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.brands.edit', $brand->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@section('scripts')
<script>
    document.getElementById('view-grid').addEventListener('click', function() {
        document.getElementById('grid-view').classList.remove('hidden');
        document.getElementById('table-view').classList.add('hidden');
    });

    document.getElementById('view-table').addEventListener('click', function() {
        document.getElementById('table-view').classList.remove('hidden');
        document.getElementById('grid-view').classList.add('hidden');
    });
</script>
@endsection
