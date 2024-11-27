<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = [
    //     'nama',
    //     'slug',
    //     'bahan',
    //     'harga',
    //     'manfaat',
    //     'ukuran',
    //     'deskripsi',
    //     'stok',
    //     'status',
    //     'image',
    //     'dibuat'
    // ];

    // Relasi: 1 Produk dapat dimiliki oleh banyak Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
