@extends('layouts.app')

@section('content')
    <!-- Include CSS and JS for Select2 and Summernote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        select,
        .note-editor {
            scrollbar-width: none;
        }
    </style>

    <div class="w-full flex justify-center">
        <div class="xl:w-1/2 lg:w-2/3 md:w-3/4 sm:w-full">
            <form id="createProductForm" class="space-y-6 bg-white shadow-lg rounded-xl p-8"
                action="{{ route('admin.product.store') }}" method="POST">
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
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-full p-2.5 js-example-basic-multiple"
                        multiple="multiple">
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->name_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Deskripsi Field -->
                <div class="bg-gray-50 p-5 rounded-lg">
                    <label for="description" class="block text-sm font-medium text-gray-900">Deskripsi</label>
                    <textarea id="description" name="description" class="hidden">{{ old('description') }}</textarea>
                    <div id="summernote"></div>
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
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.js-example-basic-multiple').select2({
                placeholder: "Select categories",
                allowClear: true
            });

            // Initialize Summernote
            $('#summernote').summernote({
                height: 300, // Set editor height
                minHeight: null, // Set minimum height of editor
                maxHeight: null, // Set maximum height of editor
                focus: true, // Set focus to editable area after initializing
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                callbacks: {
                    onInit: function() {
                        // Add custom Tailwind classes to Summernote buttons
                        $('.note-btn').addClass('bg-blue-500 text-white hover:bg-blue-700');
                    }
                }
            });

            // Set Summernote content from textarea
            $('#summernote').summernote('code', $('textarea[name="description"]').val());

            // Confirm before submitting
            $('#createProductForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                Swal.fire({
                    title: "apakah anda yakin untuk menyimpannya?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    denyButtonText: "Jangan disimpan"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Set textarea value from Summernote
                        $('textarea[name="description"]').val($('#summernote').summernote('code'));
                        this.submit(); // Submit the form if user confirms
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
            });
        });
    </script>
@endsection
