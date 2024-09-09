@extends('layout.main')

@section('container')
<div class="flex flex-wrap gap-4 justify-center">
    @foreach ($products as $product)
        <a href="/product/{{$product->slug}}" class="group rounded-xl max-w-xs w-56 block overflow-hidden">
            <img src="https://images.unsplash.com/photo-1599481238640-4c1288750d7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2664&q=80"
                alt=""
                class="h-60 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-64" />

            <div class="relative border border-gray-100 bg-white flex py-2 justify-center">
                <h3 class="text-lg font-medium text-gray-900"> {{$product->name_product}} </h3>
                <p class="text-sm text-gray-600">
                    Kategori:
                    @if ($product->kategori_produk && $product->kategori_produk->isNotEmpty())
                        @foreach ($product->kategori_produk as $kategori)
                            {{ $kategori->name_kategori }}
                        @endforeach
                    @else
                        No Category
                    @endif
                </p>
            </div>
        </a>
    @endforeach
</div>
@endsection
