<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['name_kategori'];

    // Definisikan relasi banyak-ke-banyak ke model Product
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'kategori_produk', 'kategori_id', 'product_id');
    }
}
