@extends('layouts.app')

@section('content')
    <!-- Include Select2 and Summernote CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

        <form id="editProductForm" action="{{ route('admin.product.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="name" name="name_product"
                    value="{{ old('name_product', $product->name_product) }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Slug Field -->
            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug:</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Image Upload Field -->
            <div class="mb-4">
                <label for="img" class="block text-sm font-medium text-gray-700">Upload Image:</label>
                <input type="file" id="img" name="img"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:font-medium file:bg-gray-100 hover:file:bg-gray-200">
                @if ($product->img)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/products/' . $product->img) }}" alt="{{ $product->name_product }}"
                            width="150">
                    </div>
                @endif
            </div>

            <!-- Kategori Field -->
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori:</label>
                <select id="kategori" name="kategori[]" multiple
                    class="js-example-basic-multiple mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ $product->kategori_product->contains($kategori->id) ? 'selected' : '' }}>
                            {{ $kategori->name_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi Field -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi:</label>
                <textarea id="description" name="description" class="hidden">{{ old('description', $product->description) }}</textarea>
                <div id="summernote"></div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.js-example-basic-multiple').select2({
                placeholder: 'Pilih kategori',
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
            $('#editProductForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                Swal.fire({
                    title: "Apakah kamu yakin ingin menyimpan perubahan?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    denyButtonText: "Jangan simpan"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Set textarea value from Summernote
                        $('textarea[name="description"]').val($('#summernote').summernote('code'));
                        this.submit(); // Submit the form if user confirms
                    } else if (result.isDenied) {
                        Swal.fire("Perubahan gagal disimpan", "", "info");
                    }
                });
            });
        });
    </script>
@endsection
@endsection
