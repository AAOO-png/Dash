@extends('layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        select, trix-editor {
            scrollbar-width: none;
        }
    </style>

    <div class="w-full flex justify-center">
        <div class="xl:w-1/2 lg:w-2/3 md:w-3/4 sm:w-full">
            <form id="createProductForm" class="space-y-6 bg-white shadow-lg rounded-xl p-8" action="{{ route('admin.product.store') }}" method="POST">
                @csrf

                <!-- Nama Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-900">Nama</label>
                    <input id="name" name="name_product" type="text" autocomplete="off" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 py-2 px-3 text-gray-900 shadow-sm placeholder:text-gray-400 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <!-- Slug Field -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-900">Slug</label>
                    <input id="slug" name="slug" type="text" autocomplete="off" required
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 py-2 px-3 text-gray-900 shadow-sm placeholder:text-gray-400 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <!-- Kategori Field -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-900">Kategori</label>
                    <select id="kategori" name="kategori[]"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-full p-2.5 js-example-basic-multiple" multiple="multiple">
                        @foreach ($kategoris as $kategori)
                             <option value="{{ $kategori->id }}">{{ $kategori->name_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Deskripsi Field -->
                <div class="bg-gray-50 p-5 rounded-lg">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-900">Deskripsi</label>
                    <input id="deskripsi" type="hidden" name="description">
                    <trix-editor input="deskripsi" class="w-full"></trix-editor>
                </div>

                <!-- Submit Button -->
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

            $('#createProductForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                Swal.fire({
                    title: "Do you want to save the changes?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Save",
                    denyButtonText: "Don't save"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit(); // Submit the form if user confirms
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
            });
        });
    </script>
@endsection
