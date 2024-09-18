<div class="sticky top-0 w-64 h-screen bg-gray-800 text-white p-6 flex flex-col justify-between">
    <div>
        <h2 class="text-xl font-medium mb-8">Selamat datang {{ Auth::user()->name }}</h2>
        <ul>
            <li class="mb-6">
                <a href="{{ route('dashboard') }}" class="text-base hover:text-gray-300 flex items-center">
                    <i class="fas fa-home text-xl mr-4"></i>  
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="mb-6">
                <a href="{{ route('admin.slides.index') }}" class="text-base hover:text-gray-300 flex items-center">
                    <i class="fas fa-images text-xl mr-4"></i>
                    <span>Slide</span>
                </a>
            </li>
            <li class="mb-6">
                <a href="{{ route('admin.product.index') }}" class="text-base hover:text-gray-300 flex items-center">
                    <i class="fas fa-box-open text-xl mr-4"></i>
                    <span>Products</span>
                </a>
            </li>
            <li class="mb-6">
                <a href="{{ route('admin.kerjasama.index') }}" class="text-base hover:text-gray-300 flex items-center">
                    <i class="fas fa-handshake text-xl mr-4"></i>
                    <span>Kerjasama</span>
                </a>
            </li>
            <li class="mb-6">
                <a href="{{ route('admin.brands.index') }}" class="text-base hover:text-gray-300 flex items-center">
                    <i class="fas fa-tag text-xl mr-4"></i>
                    <span>Brands</span>
                </a>
            </li>
            <li class="mb-6">
                <a href="{{ route('admin.video.showVideos') }}" class="text-base hover:text-gray-300 flex items-center">
                    <i class="fas fa-film text-xl mr-4"></i>
                    <span>Video</span>
                </a>
            </li>
            <li class="mb-6">
                <a href="{{ route('pesan.index') }}" class="text-base hover:text-gray-300 flex items-center">
                    <i class="fas fa-envelope text-xl mr-4"></i>
                    <span>Pesan Masuk</span>
                </a>
            </li>
        </ul>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left text-base hover:text-gray-300 flex items-center">
            <i class="fas fa-sign-out-alt text-xl mr-4"></i>
            <span>Logout</span>
        </button>
    </form>
</div>
