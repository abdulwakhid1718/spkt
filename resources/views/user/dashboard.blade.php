@extends('user.layout.app')

@section('title', 'Dashboard')

@section('main')
    <div class="container mt-5">
        <h4 class="mb-4 text-capitalize">Daftar Laporan {{ Auth::user()->nama_lengkap }}</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Dokumen Hilang</th>
                    <th scope="col">Tanggal Kehilangan</th>
                    <th scope="col">Tanggal Laporan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporans as $laporan)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $laporan->dokumen->nama_dokumen }}</td>
                        <td>{{ $laporan->tanggal_kehilangan }}</td>
                        <td>{{ $laporan->tanggal_laporan }}</td>
                        <td>
                            <span
                                class="badge 
                                @if ($laporan->status_laporan == 'diproses') bg-warning 
                                @elseif ($laporan->status_laporan == 'selesai') bg-success 
                                @else badge-danger @endif">
                                {{ $laporan->status_laporan }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada laporan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="/pelaporan/create" class="btn btn-warning"><i class="bi bi-telephone"></i> Buat Laporan</a>
        </div>
    </div>
@endsection
