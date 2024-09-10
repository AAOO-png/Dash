<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Tampilkan daftar semua produk
    public function index(Request $request)
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori
        
        $products = Product::filter($request->only('search', 'kategori'))->get();
        
        return view('admin.product.index', [
            'products' => $products,
            'kategoris' => $kategoris // Kirimkan $kategoris ke view
        ]);
    }

    // Tampilkan form untuk membuat produk baru
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.product.create', compact('kategoris'));
    }

    // Simpan produk baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle file upload
            $fileName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $fileName);

            // Generate unique slug
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;

            // Check for slug uniqueness and modify if necessary
            while (Product::where('slug', $slug)->exists()) {
                $slug = "{$originalSlug}_{$count}";
                $count++;
            }

            // Save product data to the database
            $product = Product::create([
                'name' => $request->name,
                'slug' => $slug, // Save the unique slug
                'description' => $request->deskripsi,
                'price' => $request->price,
                'img' => $fileName, // Save image file name
            ]);

            // Link categories to the product using the pivot table
            $product->kategori_product()->sync($request->kategori);

            // Redirect after successful save
            return redirect()->route('product.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            // Handle errors and provide an error message
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }

    // Tampilkan produk berdasarkan ID
    public function show(Product $product, $slug)
    {
        // Load product with kategori_product relationship  
        $product = Product::where('slug', $slug)->with('kategori_product')->firstOrFail();
        
        return view('product', [
            'product' => $product,
            'products' => Product::all(),
        ]);
    }

    public function showByKategori(Kategori $kategori = null)
    {
        $products = Product::whereHas('kategori_product', function ($query) use ($kategori) {
            $query->where('name', $kategori->name);
        })->with('kategori_product')->get();

        if ($kategori) {
            $selectedCategory = $kategori->name;
        } else {
            $products = Product::with('kategori_product')->get();
            $selectedCategory = 'All';
        }

        $allKategoris = Kategori::all(); // Mengambil semua kategori

        return view('products', [
            'products' => $products,
            'selectedCategory' => $selectedCategory,
            'kategoris' => $allKategoris, // Mengirimkan semua kategori ke view
        ]);
    }

    // Tampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori
        return view('admin.product.editProduct', compact('product', 'kategoris'));
    }

    // Update produk di database
    public function update(Request $request, Product $product)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        try {
            // Update data produk
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
            ]);
    
            // Sinkronisasi kategori dengan produk
            $product->kategori_product()->sync($request->kategori);
    
            // Jika ada gambar baru
            if ($request->hasFile('image')) {
                // Handle file upload
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
    
                // Update nama gambar di database
                $product->update(['img' => $fileName]);
            }
    
            // Redirect setelah sukses update
            return redirect()->route('product.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            // Handle errors and provide an error message
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }
    

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id); // Temukan produk atau gagal

            // Hapus relasi antara produk dan kategori
            $product->kategori_product()->detach();

            // Hapus produk itu sendiri
            $product->delete();

            return redirect()->back()->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the product.');
        }
    }
}
