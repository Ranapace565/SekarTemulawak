<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registrasiController extends Controller
{
    public function index()
    {
        return view("login.registrasi");
    }
    public function show()
    {
        return view("login.login");
    }
    public function login()
    {
        return view("login.login");
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['password'] = Hash::make($validatedData['password']); 

        User::create($validatedData);

        // $request->session()->flash('success', 'Registrasi berhasil, Lakukan Login!');
        return redirect()->route('login')->with('success', 'Registrasi berhasil, Lakukan Login!');
    }
}
