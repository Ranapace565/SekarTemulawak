<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login.login");
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->is_admin === 1) {
                return redirect()->route('admin-produk.index')->with('success', 'Selamat datang, Admin!');
            }

            return redirect()->route('landingpage.index')->with('success', 'Berhasil Login!');
        }

        return back()->with('loginError', 'Login gagal!')->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        // return redirect()->intended('landingpage.index')->with('success', '');
        return redirect()->route('landingpage.index')->with('success', 'Berhasil logout!');
    }
    public function destroy(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->intended('/')->with('success', '');
    }
}
