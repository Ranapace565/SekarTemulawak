<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bahan', 'manfaat', 'ukuran', 'deskripsi', 'stok', 'harga', 'status', 'images'];

    protected $casts = [
        'images' => 'array', // Cast the images field to an array
    ];
}
