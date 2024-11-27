<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function ubahPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Verifikasi password lama
        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors(['password_lama' => 'Password lama salah!']);
        }

        // Update password baru
        $user->password = Hash::make($request->password_baru);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah!');
    }
}
