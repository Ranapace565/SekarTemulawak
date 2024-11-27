<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $landing = Landing::all();
        return view('admin.landing', ['landing' => $landing, 'title' => 'Tampilan Landing']);
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'body' => 'required|string|max:255',
        // ]);

        Landing::create([
            'body' => $request->body,
        ]);

        return redirect()->route('landing.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $landing = Landing::findOrFail($id);
        return view('admin.ubah_landing', ['landing' => $landing, 'title' => 'Edit Landing']);
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'body' => 'required|string|max:255',
        // ]);

        $landing = Landing::findOrFail($id);
        $landing->update([
            'body' => $request->body,
        ]);

        return redirect()->route('landing.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $landing = Landing::findOrFail($id);
        $landing->delete();

        return redirect()->route('landing.index')->with('success', 'Data berhasil dihapus');
    }
}
