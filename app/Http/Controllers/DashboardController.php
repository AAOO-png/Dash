<?php
// App/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Pesan;
use App\Models\Slide;
use App\Models\Videos;
use App\Models\Product;
use App\Models\Kerjasama;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data
        $products = Product::all();
        $slides = Slide::all();
        $brands = Brand::all();
        $logos = Kerjasama::all();
        $pesan = Pesan::latest()->get();

        // Menghitung jumlah publish dan unpublish untuk setiap model
        $publishedSlides = Slide::where('is_publish', 1)->count();
        $unpublishedSlides = Slide::where('is_publish', 0)->count();

        $publishedProducts = Product::where('is_publish', 1)->count();
        $unpublishedProducts = Product::where('is_publish', 0)->count();

        $publishedBrands = Brand::where('is_publish', 1)->count();
        $unpublishedBrands = Brand::where('is_publish', 0)->count();

        $publishedKerjasama = Kerjasama::where('is_publish', 1)->count();
        $unpublishedKerjasama = Kerjasama::where('is_publish', 0)->count();
        
        $publishedVideos = Videos::where('is_publish', 1)->count();
        $unpublishedVideos = Videos::where('is_publish', 0)->count();
        
        // Kirim data ke view
        return view('dashboard', compact(
            'products', 'slides', 'brands', 'logos', // Ini untuk data mentah
            'publishedSlides', 'unpublishedSlides',  // Untuk jumlah publish/unpublish slide
            'publishedProducts', 'unpublishedProducts',  // Untuk jumlah publish/unpublish product
            'publishedBrands', 'unpublishedBrands',  // Untuk jumlah publish/unpublish brand
            'publishedVideos', 'unpublishedVideos',
            'publishedKerjasama', 'unpublishedKerjasama',
            'pesan'  // Untuk jumlah publish/unpublish kerjasama
        
        ));
    }
}
