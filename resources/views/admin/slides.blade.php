@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Slides</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($slides as $slide)
            <div class="p-4 border rounded-lg shadow-md bg-white">
                <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}" class="w-full h-48 object-cover mb-4 rounded">
                <h3 class="text-xl font-bold mb-2">{{ $slide->title }}</h3>
                <p class="text-gray-700">{{ $slide->description }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
