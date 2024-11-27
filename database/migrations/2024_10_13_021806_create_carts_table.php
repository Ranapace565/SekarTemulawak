<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah');
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'carts_user_id'
            )->onDelete('cascade');
            $table->foreignId('produk_id')->constrained(
                table: 'produks',  // Mengganti 'prducts' menjadi 'products'
                indexName: 'carts_produk_id'
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
