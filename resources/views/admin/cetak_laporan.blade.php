@extends('admin.layout.app')

@section('main')
    <div class="pagetitle">
        <h1>Cetak Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Laporan</li>
                <li class="breadcrumb-item active">Cetak Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pilih Rentang Tanggal dan Status</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('laporan.cetak.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Laporan</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="diproses">Diproses</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection