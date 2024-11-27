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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('bahan');
            $table->string('manfaat');
            $table->string('ukuran');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->integer('harga');
            // $table->boolean('status');
            $table->string('gambar');
            // $table->timestamp('dibuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
