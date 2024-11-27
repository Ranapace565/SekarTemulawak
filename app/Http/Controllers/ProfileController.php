<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Tampilkan data pengguna ke halaman admin.profile
        return view('admin.profile', compact('user'))->with('title', 'Profile');
    }
}
