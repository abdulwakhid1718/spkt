@extends('admin.layout.app')

@section('main')
    <div class="pagetitle">
        <h1>Data Pelapor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pelapor</h5>
                        @if (session('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="bi bi-check-circle-fill"></i>&nbsp;
                                <div>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">
                            </div>
                            <div class="datatable-container">
                                <table id="example" class="table datatable datatable-table">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true">No</th>
                                            <th data-sortable="true">NIK</th>
                                            <th data-sortable="true">Nama Lengkap
                                            </th>
                                            <th data-sortable="true">Jenis Kelamin
                                            </th>
                                            <th data-sortable="true">Pekerjaan
                                            </th>
                                            <th data-sortable="true" class="red">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pelapors as $pelapor)
                                            <tr data-index="0">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $pelapor->nik }}</td>
                                                <td class="text-capitalize">{{ $pelapor->nama_lengkap }}</td>
                                                <td>{{ $pelapor->jenis_kelamin }}</td>
                                                <td>{{ $pelapor->pekerjaan }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary mb-1" data-bs-toggle="modal"
                                                        data-bs-target="#detailUserModal"
                                                        onclick="showDetailPengguna('{{ $pelapor->id }}', '{{ $pelapor->nik }}', '{{ $pelapor->nama_lengkap }}', '{{ $pelapor->tempat_lahir }}', '{{ $pelapor->jenis_kelamin }}', '{{ $pelapor->agama }}', '{{ $pelapor->pekerjaan }}', '{{ $pelapor->nomor_wa }}', '{{ $pelapor->alamat }}', '{{ $pelapor->created_at }}')">
                                                        <i class="bi bi-pencil"></i></button>
                                                    <form id="delete-form-{{ $pelapor->id }}"
                                                        action="/pengguna/{{ $pelapor->id }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmDelete({{ $pelapor->id }})"><i
                                                                class="bi bi-trash2-fill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="datatable-bottom">
                            </div>
                        </div>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="detailUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailUserModalLabel">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formUpdateUser" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body text-capitalize">
                        <input type="hidden" id="userId" name="user_id" class="form-control text-capitalize">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="detailNama" class="col-form-label">Nama Pengguna</label>
                                <input type="text" name="nama" id="detailNama" class="form-control text-capitalize">
                            </div>
                            <div class="col-md-6">
                                <label for="detailNik" class="col-form-label">NIK</label>
                                <input disabled type="email" id="detailNik" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="detailJenisKelamin" class="col-form-label">Jenis Kelamin</label>
                                <select id="detailJenisKelamin" name="jenis_kelamin" class="form-select text-capitalize">
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="detailAgama" class="col-form-label">Agama</label>
                                <select id="detailAgama" name="agama" class="form-select text-capitalize">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="detailPekerjaan" class="col-form-label">Pekerjaan</label>
                                <input type="text" id="detailPekerjaan" name="pekerjaan"
                                    class="form-control text-capitalize">
                            </div>
                            <div class="col-md-6">
                                <label for="detailAlamat" class="col-form-label">Alamat</label>
                                <input type="text" id="detailAlamat" name="alamat"
                                    class="form-control text-capitalize">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="detailTelepon" class="col-form-label">Nomor Whatsaap</label>
                                <input type="tel" id="detailTelepon" name="nomor_wa" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="detailTanggalLahir" class="col-form-label">Tempat Lahir</label>
                                <input type="text" id="detailTanggalLahir" name="tempat_lahir" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="detailCreatedAt" class="col-form-label">Tanggal Registrasi</label>
                                <input disabled type="text" id="detailCreatedAt" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="text" id="password" name="password" placeholder="Enter Password"
                                    class="form-control">
                                <small class="text-danger">Kosongkan password apabila tidak ingin mengubahnya</small>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
