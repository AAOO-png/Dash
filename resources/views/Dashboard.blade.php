@extends('layouts.app')

@section('content')
    <div class="container py-4 text-white">
        <h1 class="text-start text-gray-900 mb-4"> Dashboard </h1>

        <div class="row ">
            <!-- Slides -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-56  bg-primary shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">Slides</p>
                                <i class="fas fas fa-images fa-2x"></i>
                            </div>
                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center align-items-center border-r-2 border-black border-opacity-20">
                                    <span class="badge bg-success">Published</span>
                                    <h3 class="mb-0 mx-2">{{ $publishedSlides }}</h3>
                                </div>
                                <div class="w-1/2 flex justify-center align-items-center border-l-2 border-black border-opacity-20">
                                    <span class="badge bg-danger">Unpublished</span>
                                    <h3 class="mb-0 mx-2">{{ $unpublishedSlides }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="col-lg-4 col-md-8 mb-4">
                <div class="card h-56  bg-success shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">Products</p>
                                <i class="fas fa-boxes fa-2x"></i>
                            </div>
                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center align-items-center border-r-2 border-black border-opacity-20">
                                    <span class="badge bg-success">Published</span>
                                    <h3 class="mb-0 mx-2">{{ $publishedProducts }}</h3>
                                </div>
                                <div class="w-1/2 flex justify-center align-items-center border-l-2 border-black border-opacity-20">
                                    <span class="badge bg-danger">Unpublished</span>
                                    <h3 class="mb-0 mx-2">{{ $unpublishedProducts }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Brands -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-56  bg-warning shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">Brands</p>
                                <i class="fas fa-tags fa-2x"></i>
                            </div>
                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center align-items-center border-r-2 border-black border-opacity-20">
                                    <span class="badge bg-success">Published</span>
                                    <h3 class="mb-0 mx-2">{{ $publishedBrands }}</h3>
                                </div>
                                <div class="w-1/2 flex justify-center align-items-center border-l-2 border-black border-opacity-20">
                                    <span class="badge bg-danger">Unpublished</span>
                                    <h3 class="mb-0 mx-2">{{ $unpublishedBrands }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kerjasama -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-56  bg-info shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">Kerjasama</p>
                                <i class="fas fa-handshake fa-2x"></i>
                            </div>
                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center align-items-center border-r-2 border-black border-opacity-20">
                                    <span class="badge bg-success">Published</span>
                                    <h3 class="mb-0 mx-2">{{ $publishedKerjasama }}</h3>
                                </div>
                                <div class="w-1/2 flex justify-center align-items-center border-l-2 border-black border-opacity-20">
                                    <span class="badge bg-danger">Unpublished</span>
                                    <h3 class="mb-0 mx-2">{{ $unpublishedKerjasama }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Videos -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-56  bg-danger shadow">
                    <div class="card-body">
                        <div class="flex flex-col">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">Videos</p>
                                <i class="fas fa-video fa-2x"></i>
                            </div>
                            <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-36 w-full rounded-lg text-white">
                                <div class="w-1/2 flex justify-center align-items-center border-r-2 border-black border-opacity-20">
                                    <span class="badge bg-success">Published</span>
                                    <h3 class="mb-0 mx-2">{{ $publishedVideos }}</h3>
                                </div>
                                <div class="w-1/2 flex justify-center align-items-center border-l-2 border-black border-opacity-20">
                                    <span class="badge bg-danger">Unpublished</span>
                                    <h3 class="mb-0 mx-2">{{ $unpublishedVideos }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
            <div class="card h-56 bg-secondary shadow">
                <div class="card-body">
                    <div class="flex flex-col">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Pesan</p>
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>

                        <div class="bg-black flex flex-row bg-opacity-25 p-2 mt-1 h-40 w-full rounded-lg text-white">
                            <div class="w-full flex">
                                <table class=" relative table-auto w-full text-left">
                                    <thead>
                                        <tr class="">
                                            <th class="px-2  w-1/6 ">Nama</th>
                                            <th class="px-2  w-1/6">Instansi</th>
                                            <th class="px-2  w-1/6">Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pesan as $item)
                                            <tr>
                                                <td class="px-2 w-1/6">{{ $item->name }}</td>
                                                <td class="px-2 w-1/6">{{ $item->instansi }}</td>
                                                <td class="px-2 w-2/6">{{ $item->message }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">tidak ada pesan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection