@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">  </h1>

    <div class="row">
        <!-- Slides -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            {{-- <h3 class="mb-0">{{ $publishedSlidesCount }} / {{ $unpublishedSlidesCount }}</h3> --}}
                            <p class="mb-0">Slides (Published / Unpublished)</p>
                        </div>
                        <i class="fas fas fa-images fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="col-lg-4 col-md-8 mb-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            {{-- <h3 class="mb-0">{{ $publishedProductsCount }} / {{ $unpublishedProductsCount }}</h3> --}}
                            <p class="mb-0">Products (Published / Unpublished)</p>
                        </div>
                        <i class="fas fa-boxes fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Brands -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            {{-- <h3 class="mb-0">{{ $publishedBrandsCount }} / {{ $unpublishedBrandsCount }}</h3> --}}
                            <p class="mb-0">Brands (Published / Unpublished)</p>
                        </div>
                        <i class="fas fa-tags fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kerjasama -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-info shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            {{-- <h3 class="mb-0">{{ $publishedKerjasamaCount }} / {{ $unpublishedKerjasamaCount }}</h3> --}}
                            <p class="mb-0">Kerjasama (Published / Unpublished)</p>
                        </div>
                        <i class="fas fa-handshake fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Videos -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            {{-- <h3 class="mb-0">{{ $publishedVideosCount }} / {{ $unpublishedVideosCount }}</h3> --}}
                            <p class="mb-0">Videos (Published / Unpublished)</p>
                        </div>
                        <i class="fas fa-video fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
