<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class AdminController extends Controller
{
    private function cekLogin()
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu sebagai admin');
        }
    }

    public function dashboard()
    {
        if (!session('login')) return $this->cekLogin();

        $portfolio = Portfolio::first();

        return view('admin.dashboard', compact('portfolio'));
    }

    public function edit()
    {
        if (!session('login')) return $this->cekLogin();

        $portfolio = Portfolio::first();

        return view('admin.edit', compact('portfolio'));
    }

    public function update(Request $request)
    {
        $portfolio = Portfolio::first();

        $portfolio->update([
            'nama' => $request->nama,
            'profesi' => $request->profesi,
            'deskripsi' => $request->deskripsi,
            'github' => $request->github,
        ]);

        return redirect('/admin')->with('success', 'Data berhasil diupdate');
    }
}
