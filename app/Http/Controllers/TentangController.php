<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Sosmed;
use App\Models\Rekening;
use App\Models\Team;
use Illuminate\Http\Request;

class TentangController extends Controller
{


    public function index()
    {
        $sosmed = Sosmed::all();
        $rekening = Rekening::all();
        $team = Team::all();
        $alamat = Alamat::all();

        return view("admin_tentang.tentang", [
            'sosmed' => $sosmed,
            'rekening' => $rekening,
            'teams' => $team,
            'alamat' => $alamat,
        ])->with('title', 'Tentang Sekar Temulawak');
    }
}
