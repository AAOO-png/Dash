<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'name_product' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->name_product = $request->name_product;
        $product->slug = $request->slug;
        $product->description = $request->description;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->img = $imageName;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
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
            $products = Product::with('kategoris')->get();
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
    public function edit($id)
    {
        $product = Product::with('kategori_product')->findOrFail($id);
        $kategoris = Kategori::all(); // Asumsikan Anda punya model Kategori

        return view('admin.product.edit', compact('product', 'kategoris'));
    }


    // Update produk di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_product' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'kategori' => 'required|array', // Pastikan kategori dikirim sebagai array
        ]);

        $product = Product::findOrFail($id); // Cari produk berdasarkan ID
        $product->name_product = $request->input('name_product'); // Update nama produk
        $product->slug = $request->input('slug'); // Update slug
        $product->description = $request->input('description'); // Update deskripsi
        $product->save(); // Simpan perubahan

        // Sinkronisasi kategori yang dipilih dengan produk
        $product->kategori_product()->sync($request->input('kategori'));

        return redirect()->route('admin.product.index')->with('success', 'Product berhasil diperbarui');
    }

    // Hapus produk dari database
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
