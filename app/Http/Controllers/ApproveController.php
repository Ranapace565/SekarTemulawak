<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
    public function update($id)
    {

        // Cari pesanan berdasarkan ID
        $pesanan = pesanan::findOrFail($id);


        $pesanan->status = 'Approve';

        if ($pesanan->status === 'sudah dibayar') {
            // Jika sudah dibayar, update status pesanan menjadi 'Approve'
            $pesanan->status = 'Approve';
            $pesanan->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Pesanan berhasil diupdate menjadi Approve.'
            ]);
        } else {
            // Jika belum dibayar, kirim respons error
            return response()->json([
                'status' => 'error',
                'message' => 'Pesanan belum dibayar, tidak dapat di-Approve.'
            ], 400);
        }
    }
}
