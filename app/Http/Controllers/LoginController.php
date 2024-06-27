<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nik' => ['required'],
            'password' => ['required'],
        ]);
    
        // Cek apakah pengguna adalah admin
        if ($credentials['nik'] === "Admin") {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
        } else {
            // Coba autentikasi sebagai pengguna biasa
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }
    
        // Jika autentikasi gagal, kembalikan dengan pesan kesalahan
        return back()->withErrors([
            'nik' => 'The provided credentials do not match our records.',
        ])->onlyInput('nik');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
