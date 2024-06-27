<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('registrasi');
    }

    public function register(Request $request){
         // Validasi data
        $request->validate([
            'nik' => 'required|string|max:16',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'jenkel' => ['required', 'string', Rule::in(['Laki-Laki', 'Perempuan'])],
            'agama' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'no_wa' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string|max:255',
        ]);

        // Simpan pengguna ke dalam database
        $user = new User();
        $user->nik = $request->nik;
        $user->nama_lengkap = $request->nama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->jenis_kelamin = $request->jenkel;
        $user->agama = $request->agama;
        $user->pekerjaan = $request->pekerjaan;
        $user->nomor_wa = $request->no_wa;
        $user->password = Hash::make($request->password);
        $user->alamat = $request->alamat;
        $user->save();

        // Tampilkan pesan sukses dan arahkan pengguna ke halaman yang sesuai
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
