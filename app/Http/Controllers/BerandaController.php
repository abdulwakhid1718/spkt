<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::all();
        if (Auth::user()) {
            return Auth::user()->pekerjaan == 'Admin' ? redirect('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.') : view('welcome', [
                'dokumens' => $dokumen
            ]);
        }else{
            return view('welcome', [
                'dokumens' => $dokumen
            ]);
        }
        
    }
}
