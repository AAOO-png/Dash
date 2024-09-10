@extends('layouts.app')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<style>
    select {
        scrollbar-width: none;
    }

    trix-editor {
        scrollbar-width: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white; /* Latar belakang putih untuk tabel */
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    .btn {
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #4CAF50;
        color: white;
    }

    .btn-edit:hover {
        background-color: #45a049;
    }

    .btn-delete {
        background-color: #f44336;
        color: white;
    }

    .btn-delete:hover {
        background-color: #e53935;
    }

    /* Tambahkan gaya untuk membungkus tabel dalam container */
    .table-container {
        background-color: white;
        padding: 16px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        class="bg-white p-6 rounded-lg shadow-md mb-6">
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
        <div class="table-container"> <!-- Bungkus tabel dalam container -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Nama Image</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logos as $index => $logo)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><img src="{{ asset('uploads/kerjasama/' . $logo->image) }}" alt="Logo Kerjasama"
                                class="w-24 h-24 object-cover"></td>
                            <td>{{ $logo->name_img }}</td>
                            <td>
                                <a href="{{ route('admin.kerjasama.edit', $logo->id) }}" class="btn btn-edit">Edit</a>

                                <form action="{{ route('admin.kerjasama.destroy', $logo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah anda ingin menghapusnya?');"
                                        class="btn btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
