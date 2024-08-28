<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_image', // Pastikan nama kolom sesuai
        'image',
        'is_publish',
    ];
    protected $table = 'slides';

}

