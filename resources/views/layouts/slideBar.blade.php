<div class="sticky top-0 w-64 h-screen bg-gray-800 text-white p-6 flex flex-col justify-between">
    <div>
        <h2 class="text-2xl font-semibold mb-6">Selamat datang</h2>
        <ul>
            <li class="mb-4"><a href="{{ route('dashboard') }}" class="text-lg hover:text-gray-300">Dashboard</a></li>
            <li class="mb-4"><a href="{{ route('admin.slides.index') }}" class="text-lg hover:text-gray-300">Slide</a></li>
            <li class="mb-4"><a href="{{ route('admin.product.index') }}" class="text-lg hover:text-gray-300">Products</a></li>
            <li class="mb-4"><a href="{{ route('admin.kerjasama.index') }}" class="text-lg hover:text-gray-300">Kerjasama</a></li>
            <li class="mb-4"><a href="{{ route('admin.brands.index') }}" class="text-lg hover:text-gray-300">Brands</a></li>
        </ul>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left text-lg hover:text-gray-300">
            Logout
        </button>
    </form>
</div>
