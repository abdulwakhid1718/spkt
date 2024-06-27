<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Laporan;
use App\Models\BuktiDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $laporan = Laporan::all();
            return view('admin.pelaporan', [
                // dd($laporan);
                'laporan' => $laporan
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
        return view('user.create_laporan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaporanRequest $request)
    {
        // Validasi data

        // Mendapatkan ID dokumen berdasarkan nama
        $dokumenId = Dokumen::where('nama_dokumen', $request['berkas_kehilangan'])->firstOrFail()->id;

        // Simpan data laporan baru
        $laporan = new Laporan();
        $laporan->dokumen_id = $dokumenId;
        $laporan->user_id = Auth::id();
        $laporan->tanggal_kehilangan = $request['tanggal_kejadian'];
        $laporan->tanggal_laporan = now();
        $laporan->lokasi_kehilangan = $request['tempat_kejadian'];
        $laporan->kronologi = $request['kronologi'];
        $laporan->status_laporan = "diproses";
        $laporan->save();

        session(['id_laporan' => $laporan->id]);

        // Redirect ke halaman terkait atau tampilkan pesan sukses
        return redirect("/upload_bukti_laporan/$dokumenId")->with('success', 'Laporan berhasil disimpan.');
    }

    public function upload_bukti($id){
        $dokumen = Dokumen::findOrFail($id);
        $id_laporan = session('id_laporan', $id);
        return view('user.upload_syarat', [
            'dokumen_persyaratan'=> json_decode($dokumen->dokumen_persyaratan, true),
            'id_laporan' => $id_laporan
        ]);
    }

    public function upload(Request $request)
    {
        // Validasi data yang diunggah
        $request->validate([
            // Pastikan setiap file yang diunggah adalah gambar dengan tipe yang diizinkan
            'dokumen.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah sesuai kebutuhan Anda
        ]);
    
        // Simpan setiap file yang diunggah
        foreach ($request->file('dokumen') as $file) {
            // Simpan gambar ke direktori yang diinginkan
            $path = $file->store('public/dokumen'); // Ubah direktori penyimpanan sesuai kebutuhan Anda
    
            // Buat entri baru di database untuk setiap dokumen yang diunggah
            $dokumen = new BuktiDokumen();
            $dokumen->laporan_id = $request->id_laporan; // ID laporan yang sesuai dengan pengunggahan dokumen ini
            $dokumen->bukti_foto = $path; // Path file yang disimpan di server
            $dokumen->save();
        }
    
        // Redirect atau tampilkan pesan sukses
        return redirect('/')->with('success', 'Dokumen berhasil diunggah.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $laporans = Laporan::where('user_id', auth()->id())->get();
        return Auth::user()->pekerjaan == 'Admin' ? redirect('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.') : view('user.dashboard', [
            'laporans' => $laporans
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaporanRequest $request, $id)
    {
        // Validasi Data Input
        $validatedData = $request->validated();

        // Temukan Data Laporan
        $laporan = Laporan::findOrFail($id);

        // Perbarui Status Laporan
        $laporan->status_laporan = $validatedData['status']; // Pastikan nama atribut benar

        // Simpan Perubahan
        $laporan->save();

        // Redirect atau tampilkan pesan sukses
        return redirect('/pelaporan')->with('success', 'Status laporan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Ambil laporan berdasarkan ID
        $laporan = Laporan::findOrFail($id);

        // Ubah status laporan menjadi "ditolak"
        $laporan->status_laporan = 'ditolak';

        // Simpan perubahan
        $laporan->save();

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect('/pelaporan')->with('success', 'Laporan berhasil ditolak');
    }


    // Menampilkan form cetak laporan
    public function showCetakLaporanForm()
    {
        return view('admin.cetak_laporan');
    }

    // Mengolah permintaan cetak laporan
    public function cetakLaporan(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');

        $query = Laporan::whereBetween('tanggal_laporan', [$start_date, $end_date]);

        // Jika ada filter status, tambahkan kondisi where
        if ($status) {
            $query->where('status_laporan', $status);
        }

        // Ambil laporan berdasarkan rentang tanggal dan status
        $laporan = $query->get();

        return view('admin.laporan_pdf', compact('laporan', 'start_date', 'end_date'));
    }

}
