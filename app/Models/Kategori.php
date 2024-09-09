<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['name_kategori'];

    // Jika Anda menggunakan relasi banyak-ke-banyak
    public function products()
    {
        return $this->belongsToMany(Product::class, 'kategori_produk', 'kategori_id', 'product_id');
    }
}
