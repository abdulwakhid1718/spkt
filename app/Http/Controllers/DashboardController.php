<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index() {
        if (Gate::allows('isAdmin')) {
            $totalLaporan = Laporan::count();
            $totalPelapor = User::count();
        
            // Mengambil data jumlah laporan per bulan
            $laporanPerBulan = Laporan::selectRaw('MONTH(tanggal_laporan) as bulan, COUNT(*) as total')
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get();
        
            return view('admin.dashboard', compact('totalLaporan', 'totalPelapor', 'laporanPerBulan'));
        } else {
            // Jika pengguna bukan admin, Anda bisa mengarahkannya ke halaman lain
            // atau memberikan respons lain yang sesuai.
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    
}
