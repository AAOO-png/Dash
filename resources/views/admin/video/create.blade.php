@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5 p-4 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Tambah Video YouTube</h2>
    
    <!-- Menampilkan pesan sukses atau error -->
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form untuk menambahkan video -->
    <form action="{{ route('Admin.video.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Judul Video:</label>
            <input type="text" name="title" id="title" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" 
                   required>
        </div>

        <div class="mb-4">
            <label for="youtube_url" class="block text-gray-700 font-bold mb-2">URL YouTube:</label>
            <input type="url" name="youtube_url" id="youtube_url" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" 
                   placeholder="https://www.youtube.com/watch?v=VIDEO_ID" 
                   required
                   oninput="updateVideoPreview()">
        </div>

        <!-- Tempat untuk menampilkan preview video -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Preview Video:</label>
            <div class="relative pb-9/16">
                <iframe id="video_preview" class="absolute top-0 left-0 w-full h-full"
                        src=""
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>

        <button type="submit" 
                class="bg-indigo-500 text-white font-bold py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-700">
            Simpan Video
        </button>
    </form>
</div>

<!-- Tambahkan script untuk menangani perubahan URL dan menampilkan preview -->
<script>
    function updateVideoPreview() {
        const urlInput = document.getElementById('youtube_url').value;
        const videoId = extractYouTubeId(urlInput);
        const videoPreview = document.getElementById('video_preview');
        
        if (videoId) {
            videoPreview.src = https://www.youtube.com/embed/${videoId};
        } else {
            videoPreview.src = ''; // Jika ID video tidak valid, kosongkan src iframe
        }
    }

    // Fungsi untuk mengekstrak ID Video YouTube dari URL
    function extractYouTubeId(url) {
        const shortUrlMatch = url.match(/youtu\.be\/([^\?]*)/);
        if (shortUrlMatch) {
            return shortUrlMatch[1];
        }

        const normalUrlMatch = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
        if (normalUrlMatch) {
            return normalUrlMatch[1];
        }

        return null; // Jika ID tidak ditemukan
    }
</script>
@endsection