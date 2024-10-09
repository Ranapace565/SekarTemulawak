<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('middleware/home', ['title' => 'Home']);
});

Route::get('/admin-home', function () {
    return view('admin_home/dashboard', ['title' => 'Dashboard']);
});

Route::get('/admin-konten', function () {
    return view('admin_konten/daftar_artikel', ['title' => 'Blog']);
});

Route::get('/admin-produk', function () {
    return view('admin_produk/daftar_produk', ['title' => 'Produk']);
});

Route::get('/admin-produk/tambah-produk', function () {
    return view('admin_produk/tambah_produk', ['title' => 'Tambah Produk']);
});

Route::get('/admin-pesanan', function () {
    return view('admin_pesanan/daftar_pesanan', ['title' => 'Pesanan']);
});

Route::get('/admin-tentang', function () {
    return view('admin_tentang/tentang', ['title' => 'Informasi Sekar']);
});

Route::get('/admin-profile', function () {
    return view('admin/profile', ['title' => 'Profile']);
});
