<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
    ];
    // Relasi: 1 Cart memiliki 1 Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    // Relasi: 1 Cart dimiliki oleh 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
