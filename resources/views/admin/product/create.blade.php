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
    <div class="w-full flex justify-center">
        <div class="xl:w-1/2 lg:w-2/3 md:w-3/4 sm:w-full">
            <form class="space-y-6 bg-white shadow-lg rounded-xl p-8" action="{{ route('admin.product.store') }}" method="POST">
                @csrf

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-900">Nama</label>
                    <input id="nama" name="Nama" type="text" autocomplete="off" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 py-2 px-3 text-gray-900 shadow-sm placeholder:text-gray-400 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-900">Slug</label>
                    <input id="slug" name="slug" type="text" autocomplete="off" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 py-2 px-3 text-gray-900 shadow-sm placeholder:text-gray-400 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-900">Kategori</label>
                    <select id="kategori" name="kategori[]"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-full p-2.5 js-example-basic-multiple" multiple="multiple">
                        @foreach ($kategoris as $kategori)
                             <option value="{{ $kategori->id }}">{{ $kategori->name_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="bg-gray-50 p-5 rounded-lg">
                    <label for="Deskripsi" class="block text-sm font-medium text-gray-900">Deskripsi</label>
                    <input id="Deskripsi" type="hidden" name="deskripsi">
                    <trix-editor input="Deskripsi" class="w-full"></trix-editor>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Select categories",
                allowClear: true
            });
        });
    </script>
@endsection
