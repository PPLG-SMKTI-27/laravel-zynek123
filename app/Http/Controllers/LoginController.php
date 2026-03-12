<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function processLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // LOGIN ADMIN
        if ($email === 'admin@sekolah.id' && $password === '123456') {

            session([
                'login' => true,
                'email' => $email
            ]);

            return redirect()->route('dashboard')
                ->with('success', 'Login berhasil sebagai admin');
        }

        return redirect('/')
            ->with('error', 'Email atau password salah')
            ->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['login', 'email']);

        return redirect('/')
            ->with('success', 'Berhasil logout');
    }
}
