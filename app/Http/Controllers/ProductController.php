<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Kategori;
use App\Models\Product;

class ProductController extends Controller
{
    // Tampilkan daftar semua produk dan form create
    public function index()
    {
        // Ambil semua produk dan relasi kategori_product
        $products = Product::with('kategori_product')->get();
        
        // Ambil semua kategori untuk digunakan dalam form create
        $kategoris = Kategori::all();

        // Return view 'admin.products' dengan data produk dan kategori
        return view('admin.products.index', compact('products', 'kategoris'));
    }

    // Tampilkan form untuk membuat produk baru (tidak diperlukan lagi jika form ada di index)
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.products.create', compact('kategoris'));
    }

    // Simpan produk baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'Nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'price' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
        ]);

        // Log data input
        Log::info('Request Data:', $request->all());

        // Simpan data produk ke database
        $product = Product::create([
            'name_product' => $request->Nama,
            'slug' => $request->slug,
            'description' => $request->deskripsi,
        ]);

        // Log produk yang baru dibuat
        Log::info('Product Created:', $product->toArray());

        // Hubungkan kategori ke produk
        $hasil = $product->kategoris()->sync($request->kategori);

        // Log hasil sync
        Log::info('Sync Result:', $hasil);

        // Redirect setelah sukses menyimpan
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    // Tampilkan produk berdasarkan ID
    public function show(Product $product, $slug)
    {
        // Load produk dengan relasi kategori_product
        $product->load('kategori_product');

        // Dapatkan produk berdasarkan slug
        $product = Product::where('slug', $slug)->with('kategori_product')->firstOrFail();

        return view('product', compact('product'), [
            'product' => $product,
            'products' => Product::all(),
        ]);
    }

    // Tampilkan produk berdasarkan kategori
    public function showByKategori(Kategori $kategori)
    {
        $products = Product::whereHas('kategori_product', function ($query) use ($kategori) {
            $query->where('name_kategori', $kategori->name_kategori);
        })->with('kategori_product')->get();

        // Mengembalikan view dengan produk yang telah difilter
        return view('products', [
            'products' => $products,
            'kategori' => $kategori->name_kategori, // Mengirimkan nama kategori ke view jika diperlukan
        ]);
    }

    // Tampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        $kategoris = Kategori::all(); // Menambahkan kategori untuk form edit
        return view('admin.products.editProduct', compact('product', 'kategoris'));
    }
    
    

    // Update produk di database
    public function update(Request $request, Product $product)
    {
        // Validasi input dari form
       $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategoris,id',
        'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'required|string',
    ]);

    // Update produk
    $product->update($request->all());

    // Jika ada gambar baru yang diupload
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/products'), $filename);
        $product->img = $filename;
        $product->save();
    }

    // Redirect ke halaman produk dengan pesan sukses
    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diupdate!');
}

    // Hapus produk dari database
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
