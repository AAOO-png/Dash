<?php

use App\Models\Product;
use App\Models\Kerjasama;
use App\Http\Controllers\test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
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

// Route untuk slides
Route::get('/slide', function () {
    return view('admin.slides', [
        'products' => Product::all(),
    ]);
});

Route::get('/create', [test::class, 'index']);
Route::get('/product/{slug}', [ProductController::class, 'show']);
Route::get('/kategories/{kategori:name_kategori}', [ProductController::class, 'showByKategori']);

// Resource untuk produk
Route::resource('products', ProductController::class);

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Authentication routes
Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', function () {
    return redirect('/dashboard');
})->name('home');

// Routes for slides with prefix "admin" for admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/slides', [SlideController::class, 'index'])->name('slides.index');
    Route::post('/slides', [SlideController::class, 'store'])->name('slides.store');
    Route::get('/slides/{id}/edit', [SlideController::class, 'edit'])->name('slides.edit');
    Route::put('/slides/{id}', [SlideController::class, 'update'])->name('slides.update');
    Route::delete('/slides/{id}', [SlideController::class, 'destroy'])->name('slides.destroy');
    Route::patch('/slides/{id}/toggle', [SlideController::class, 'toggle'])->name('slides.toggle');

    // Routes for ProductController
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');


    Route::get('/kerjasama', [KerjasamaController::class, 'index'])->name('kerjasama.index');
    Route::post('/kerjasama', [KerjasamaController::class, 'store'])->name('kerjasama.store');
    Route::delete('/kerjasama/{id}', [KerjasamaController::class, 'destroy'])->name('kerjasama.destroy');
    Route::get('/kerjasama/{id}/edit', [KerjasamaController::class, 'edit'])->name('kerjasama.edit');
    Route::patch('/kerjasama/{id}/toggle', [KerjasamaController::class, 'toggle'])->name('kerjasama.toggle');
    Route::put('/kerjasama/{id}', [KerjasamaController::class, 'update'])->name('kerjasama.update');

    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
});

