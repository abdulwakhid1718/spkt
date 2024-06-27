<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $pelapors = User::where('pekerjaan', '!=', 'Admin')->get();
            return view('admin.pengguna', [
                // dd($laporan);
                'pelapors' => $pelapors
            ]);
        }else{
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat' => 'required|string',
            'nomor_wa' => 'required|string',
            'tempat_lahir' => 'required|string',
            'password' => 'nullable|string|min:6', // Jika ingin memperbarui password
            // Sesuaikan validasi dengan kebutuhan Anda
        ]);

        // Ambil data pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Update data pengguna dengan data baru
        $user->nama_lengkap = $validatedData['nama'];
        $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        $user->agama = $validatedData['agama'];
        $user->pekerjaan = $validatedData['pekerjaan'];
        $user->alamat = $validatedData['alamat'];
        $user->nomor_wa = $validatedData['nomor_wa'];
        $user->tempat_lahir = $validatedData['tempat_lahir'];
        // Update password jika ada input password baru
        if (isset($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        // Simpan perubahan
        $user->save();

        // Redirect atau kirim respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Temukan pengguna berdasarkan ID
            $user = User::findOrFail($id);
            
            // Hapus pengguna
            $user->delete();
            
            return redirect('/pengguna')->with('success', 'Pengguna Berhasil Dihapus.');
        } catch (\Exception $e) {
            return redirect('/pengguna')->with('error', 'Pengguna Gagal Dihapus.');
        }
    }
    
    // Menampilkan form cetak laporan
    public function showCetakPenggunaForm()
    {
        return view('admin.cetak_laporan_users');
    }

    // Mengolah permintaan cetak laporan
    public function cetakPengguna(Request $request)
    {
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
        
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');
        
        // Inisialisasi query dengan model User
        $query = User::query();
        
        // Jika ada rentang tanggal yang valid, tambahkan whereBetween ke query
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
        
        // Ambil laporan berdasarkan kondisi yang sudah ditentukan
        $users = $query->where('pekerjaan', '!=' ,'Admin')->get();        

        return view('admin.laporan_pdf_users', compact('users', 'start_date', 'end_date'));
    }

}
