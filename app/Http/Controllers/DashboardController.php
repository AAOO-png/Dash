<?php
// App/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slide;


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
    

        return view('dashboard', compact('products', 'slides')); // Pastikan view ini sesuai
    }
}
