<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    // =========================
    // TAMPILKAN HALAMAN PORTO
    // =========================
   public function index()
{
    $data = \App\Models\Portfolio::first();

    return view('welcome', [
        'nama' => $data->nama ?? '',
        'profesi' => $data->profesi ?? '',
        'deskripsi' => $data->deskripsi ?? '',
        'github' => $data->github ?? '',
        'foto1' => $data->foto_1 ?? null,
        'foto2' => $data->foto_2 ?? null,
    ]);
} 

    // =========================
    // UPLOAD FOTO (LANGSUNG KE SLOT)
    // =========================
    public function uploadFoto(Request $request)
    {
        // CEK LOGIN ADMIN - support custom session dan Breeze auth
        if (!session('login') && !auth()->check()) {
            return redirect('/')->with('error', 'Harus login dulu!');
        }

        // VALIDASI
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'slot' => 'required|in:1,2'
        ]);

        // AMBIL FILE
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // SIMPAN KE FOLDER PUBLIC/IMG
        $file->move(public_path('img'), $filename);

        // AMBIL DATA PORTFOLIO
        $portfolio = Portfolio::first();

        // SIMPAN KE SLOT FOTO
        if ($request->slot == 1) {
            $portfolio->foto_1 = $filename;
        } else {
            $portfolio->foto_2 = $filename;
        }

        $portfolio->save();

        return redirect('/dashboard')->with('success', 'Foto berhasil diupdate!');
    }
}
