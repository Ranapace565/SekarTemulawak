<?php

use App\Models\Product;
use App\Http\Controllers\Beli;
use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\itemLandingpage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\AdminPesananController;

// Route::get('/a', function () {
//     return view('admin_promosi.daftar_promosi')->with('title', 'Daftar Promosi');
// });

// Route::get('/b', [DashboardController::class, 'produkChart'])->name('produkChart');



Route::get('/storage-link', function () {
    Artisan::call('storage::link');
    return 'Storage Terhubung';
});

// if (Auth::guard('admin')->attempt($credentials)) {
//     // ...
// }
// Route::get('/', function () {
//     return view('admin_team.tambah_team', ['title' => 'Tambah Team']);
// });


Route::redirect('/', '/landingpage');


Route::resource('registrasi', RegistrasiController::class);

Route::resource('login', LoginController::class)->middleware('guest')->names([
    'index' => 'login',
]);

Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('landingpage', LandingpageController::class);

Route::resource('landingpageItem', itemLandingpage::class);

Route::get('/admin-dashboard/laporan', [AdminPesananController::class, 'laporan'])->name('pesanan.laporan');

// Route::get('/admin-pesanan/laporan', [PesananController::class, 'laporan'])->name('pesanan.laporan');


Route::middleware(['auth', 'role:user'])->group(function () {

    Route::resource('keranjang', CartController::class);
    Route::resource('pemesanan', PesananController::class);
    Route::get('pesanan', [PesananController::class, 'show']);
    Route::resource('beli', BeliController::class);
});


// Route::middleware(['auth', 'role:admin'])->group(function () {
//     //
// });


//keranjang
// Route::resource('keranjang', CartController::class)->middleware(['auth', 'role:user']);
// //keranjang


// //pemesanan
// Route::resource('pemesanan', PesananController::class)->middleware(['auth', 'role:user']);

// Route::get('pesanan', [PesananController::class, 'show'])->middleware(['auth', 'role:user']);

// Route::resource('beli', BeliController::class)->middleware(['auth', 'role:user']);


Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::post('/ubah-password', [UserController::class, 'ubahPassword'])->name('password.update');

    // Route::get('/admin-home', function () {
    //     return view('admin_home/dashboard', ['title' => 'Dashboard']);
    // });

    // Route::resource('admin-statistik', StatistikController::class);
    Route::resource('landing', LandingController::class);

    Route::resource('admin-Promosi', PromosiController::class);

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });


    Route::resource('team', TeamController::class);

    Route::resource('alamat', AlamatController::class);

    Route::resource('sosmed', SosmedController::class);

    Route::resource('rekening', RekeningController::class);

    Route::resource('admin-dashboard', DashboardController::class);

    // Pesanan
    Route::resource('admin-pesanan', AdminPesananController::class);
    Route::get('/admin-detail-pesanan', function () {
        return view('admin_pesanan/pesanan', ['title' => 'Pesanan']);
    });

    // Dashboard & Konten


    Route::get('/admin-konten', function () {
        return view('admin_konten/daftar_artikel', ['title' => 'Blog']);
    });

    // Artikel
    Route::resource('admin-artikel', ArtikelController::class);
    // Route::get('/admin-artikel/tambah-artikel', function () {
    //     return view('admin_konten/tambah_artikel', ['title' => 'Tambah Artikel']);
    // });
    // Route::get('/admin-artikel/ubah-artikel', function () {
    //     return view('admin_konten/ubah_artikel', ['title' => 'Ubah Artikel']);
    // });

    // Produk
    Route::resource('admin-produk', ProdukController::class);
    Route::get('/admin-produk/{slug}', [ProdukController::class, 'show'])->name('produk.show');
    Route::post('/admin-produk/tambah-produk', [ProdukController::class, 'insert'])->name('produk.tambah');
    Route::post('/admin-produk/update-produk/{slug}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/admin-produk/hapus-produk/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
    Route::get('/admin-produk/{slug}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::get('/tambah-produk', function () {
        return view('admin_produk/tambah_produk', ['title' => 'Tambah Produk']);
    });

    // Informasi & Profil
    Route::get('/admin-tentang', function () {
        return view('admin_tentang/tentang', ['title' => 'Informasi Sekar']);
    });

    Route::resource('admin-tentang', TentangController::class);

    Route::resource('admin-profile', ProfileController::class);

    // Route::get('/admin-profile', function () {
    //     return view('admin/profile', ['title' => 'Profile']);
    // });

    Route::post('/lokasi/simpan', [ProfileController::class, 'simpan'])->name('lokasi.simpan');
});
