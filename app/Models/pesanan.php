<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function itemPesanans()
    {
        return $this->hasMany(itemPesanan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
