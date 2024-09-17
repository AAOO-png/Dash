<?php
// App/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Brand;
// use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Kerjasama;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        // Pastikan hanya admin yang bisa mengakses dashboard
        // if (!Auth::check() || !Auth::user()->isAdmin()) {
        //     return redirect('/'); // Redirect jika bukan admin
        // }
        
        
        $products = Product::all(); // Ambil semua produk dari database
        $slides = Slide::all(); // Ambil semua slide dari database
        $brands = Brand::all(); // Fetch all brands
        $logos = Kerjasama::all();
    

        return view('dashboard', compact('slides', 'products', 'brands', 'logos'));
    }
}
