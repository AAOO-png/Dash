<?php


use App\Models\Product;
use App\Models\Kerjasama;
use App\Http\Controllers\test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
// use OpenAdmin\Admin\Controllers\Dashboard;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\Auth\LoginController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('home', [
        'products' => Product::all(),
    ]);
});

Route::get('/slide', function () {
    return view('admin.slide.index', [
        'products' => Product::all(),
    ]);
});

Route::get('/create', [test::class, 'index']);
Route::get('/product/{slug}', [ProductController::class, 'show']);
Route::get('/kategories/{kategori:name_kategori}', [ProductController::class, 'showByKategori']);

// Resource untuk produk
Route::resource('products', ProductController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Authentication routes
Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', function () {
    return redirect('/dashboard');
})->name('home');

// Route untuk slides dan products dengan prefix "admin" agar rapi
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/slides', [SlideController::class, 'index'])->name('slides.index');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    // Resource routes for slides and products
    Route::resource('slides', SlideController::class);
    Route::resource('products', ProductController::class);
});

// Route untuk testZone
Route::prefix('slide')->name('slides.')->group(function () {
    Route::get('/', [SlideController::class, 'index'])->name('index');
    Route::post('/', [SlideController::class, 'store'])->name('store');
    Route::get('{id}/edit', [SlideController::class, 'edit'])->name('edit');
    Route::put('{id}', [SlideController::class, 'update'])->name('update');
    Route::delete('{id}', [SlideController::class, 'destroy'])->name('destroy');
    Route::patch('{id}/toggle', [SlideController::class, 'toggle'])->name('toggle');
});     

//rute edit product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

Route::prefix('admin')->group(function () {
    Route::resource('brands', BrandController::class);
});



// Rute untuk Kerjasama
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('kerjasama', [KerjasamaController::class, 'index'])->name('admin.kerjasama.index');
    Route::post('kerjasama', [KerjasamaController::class, 'store'])->name('admin.kerjasama.store');
    Route::delete('kerjasama/{id}', [KerjasamaController::class, 'destroy'])->name('admin.kerjasama.destroy');
    Route::get('kerjasama/{id}/edit', [KerjasamaController::class, 'edit'])->name('admin.kerjasama.edit');
    Route::patch('kerjasama/{id}/toggle', [KerjasamaController::class, 'toggle'])->name('admin.kerjasama.toggle');
    Route::put('/admin/kerjasama/{id}', [KerjasamaController::class, 'update'])->name('admin.kerjasama.update');

});


