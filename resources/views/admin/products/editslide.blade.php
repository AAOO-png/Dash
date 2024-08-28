@extends('layouts.app')
<body>
    <form action="{{ route('testZone.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name_img">Name Image:</label>
        <input type="text" id="name_img" name="name_img" value="{{ old('name_img', $slider->name_img) }}" required>

        <label for="img">Upload New Image (optional):</label>
        <input type="file" id="img" name="img">

        <label for="is_publish">Publish:</label>
        <input type="checkbox" id="is_publish" name="is_publish" {{ $slider->is_publish ? 'checked' : '' }}>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('testZone.index') }}">Back to List</a>
</body>
</html>
@endsection