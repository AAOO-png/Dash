<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_image', // Make sure the column name matches
        'slug', // Add slug to fillable
        'image',
        'description', // Add description to fillable
        'is_publish',
    ];

    protected $table = 'slides';

    public static function boot()
    {
        parent::boot();

        // Automatically generate a slug before saving the model
        static::saving(function ($slide) {
            if (empty($slide->slug)) {
                $slide->slug = Str::slug($slide->name_image);
            }
        });
    }
}
