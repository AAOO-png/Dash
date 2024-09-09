<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    // Definisikan relasi many-to-many dengan Kategori menggunakan tabel pivot kategori_produk
    public function kategori_product()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_produk', 'product_id', 'kategori_id');
    }

    // Atribut yang dapat diisi
    protected $fillable = [
        'name', 'slug', 'description', 'img',
    ];

    // Atribut yang dilindungi
    protected $guarded = [
        'id',
    ];

    // Scope filter
    public function scopeFilter(Builder $query, array $filters): void
    {
        // Filter berdasarkan nama produk
        $query->when(isset($filters['search']) && $filters['search'], function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        });

        // Filter berdasarkan kategori
        $query->when(isset($filters['kategori']) && $filters['kategori'], function ($query) use ($filters) {
            $query->whereHas('kategori_product', function ($query) use ($filters) {
                $query->where('slug', $filters['kategori']);
            });
        });
    }

    // Setter untuk slug
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $slug = Str::slug($value);
        $originalSlug = $slug;
        $count = 1;

        // Loop untuk memastikan slug unik
        while (self::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}_{$count}";
            $count++;
        }

        $this->attributes['slug'] = $slug;
    }
}