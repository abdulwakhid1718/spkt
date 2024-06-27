@extends('admin.layout.app')

@section('main')
    <div class="pagetitle">
        <h1>Data Pelaporan</h1>
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
                        <h5 class="card-title">Data Pelaporan</h5>
                        <!-- Dropdown filter -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="statusFilter" class="form-label">Filter Berdasarkan Status:</label>
                                    <select class="form-select" id="statusFilter" onchange="filterByStatus(this.value)">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="diproses">Diproses</option>
                                        <option value="selesai">Selesai</option>
                                        <option value="ditolak">Ditolak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggalFilter" class="form-label">Filter Berdasarkan Tanggal:</label>
                                    <select class="form-select" id="tanggalFilter" onchange="filterByTanggal(this.value)">
                                        <option value="">-- Pilih Tanggal --</option>
                                        <option value="hari_ini">Hari Ini</option>
                                        <option value="7_hari_terakhir">7 Hari Terakhir</option>
                                        <option value="bulan_ini">Bulan Ini</option>
                                        <option value="-01-">Januari</option>
                                        <option value="-02-">Februari</option>
                                        <option value="-03-">Maret</option>
                                        <option value="-04-">April</option>
                                        <option value="-05-">Mei</option>
                                        <option value="-06-">Juni</option>
                                        <option value="-07-">Juli</option>
                                        <option value="-08-">Agustus</option>
                                        <option value="-09-">September</option>
                                        <option value="-10-">Oktober</option>
                                        <option value="-11-">November</option>
                                        <option value="-12-">Desember</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="bi bi-check-circle-fill"></i>&nbsp;
                                <div>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-top">

                            </div>
                            <div class="datatable-container">
                                <table id="example" class="table datatable datatable-table">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true">
                                                No
                                            </th>
                                            <th data-sortable="true" style="width: 23.98042414355628%;">
                                                Nama pelapor
                                            </th>
                                            <th data-sortable="true" style="width: 24.114192495921696%;">Dokumen</th>
                                            <th data-sortable="true" style="width: 25.732463295269167%;">Tanggal Laporan
                                            </th>
                                            <th data-format="YYYY/DD/MM" data-sortable="true" data-type="date"
                                                style="width: 12.781402936378466%;">Status
                                            </th>
                                            <th data-sortable="true" class="red" style="width: 15.39151712887439%;">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporan as $item)
                                            <tr data-index="0">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-capitalize">{{ $item->user->nama_lengkap }}</td>
                                                <td>{{ $item->dokumen->nama_dokumen }}</td>
                                                <td>{{ $item->tanggal_laporan }}</td>
                                                <td><span
                                                        class="badge 
                                                    @if ($item->status_laporan == 'diproses') bg-warning 
                                                    @elseif ($item->status_laporan == 'selesai') bg-success 
                                                    @else bg-danger @endif">
                                                        {{ $item->status_laporan }}
                                                    </span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary mb-1" data-bs-toggle="modal"
                                                        data-bs-target="#detailModal"
                                                        onclick="showDetail('{{ $item->id }}', '{{ $item->user->nama_lengkap }}', '{{ $item->dokumen->nama_dokumen }}', '{{ $item->tanggal_laporan }}', '{{ $item->tanggal_kehilangan }}', '{{ $item->lokasi_kehilangan }}', '{{ $item->kronologi }}', '{{ $item->status_laporan }}', '{{ $item->buktidokumen }}')">
                                                        <i class="bi bi-info-circle"></i></button>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="/pelaporan/{{ $item->id }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmDelete({{ $item->id }})"><i
                                                                class="bi bi-eraser-fill"></i>
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
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formGantiStatus" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body text-capitalize">
                        <input type="hidden" id="detailId" name="id_laporan" class="form-control text-capitalize">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="detailNamaPelapor" class="col-form-label">Nama Pelapor</label>
                                <input disabled type="text" id="detailNamaPelapor"
                                    class="form-control text-capitalize">
                            </div>
                            <div class="col-md-6">
                                <label for="detailDokumen" class="col-form-label">Dokumen</label>
                                <input disabled type="text" id="detailDokumen" class="form-control text-capitalize">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="detailTanggalLaporan" class="col-form-label">Tanggal Laporan</label>
                                <input disabled type="text" id="detailTanggalLaporan"
                                    class="form-control text-capitalize">
                            </div>
                            <div class="col-md-6">
                                <label for="detailTanggalKehilangan" class="col-form-label">Tanggal Kehilangan</label>
                                <input disabled type="text" id="detailTanggalKehilangan"
                                    class="form-control text-capitalize">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="detailTempatKehilangan" class="col-form-label">Tempat Kehilangan</label>
                                <input disabled type="text" id="detailTempatKehilangan"
                                    class="form-control text-capitalize">
                            </div>
                            <div class="col-md-6">
                                <label for="detailKronologi" class="col-form-label">Kronologi</label>
                                <input disabled type="text" id="detailKronologi" class="form-control text-capitalize">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="detailStatus" class="col-form-label">Status</label>
                                <select class="form-select" name="status" id="detailStatus">
                                    <!-- Options will be appended here by JavaScript -->
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="syaratImages" class="col-form-label">Syarat</label>
                                <div id="syaratImages" class="d-flex flex-wrap">
                                    <!-- Images will be appended here by JavaScript -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function filterByStatus(status) {
            var table = $('#example').DataTable();
            table.columns(4).search(status).draw();
        }

        function filterByTanggal(range) {
            var table = $('#example').DataTable();

            switch (range) {
                case 'hari_ini':
                    var today = new Date();
                    var formattedDate = formatDate(today);
                    table.columns(3).search(formattedDate).draw();
                    break;
                case '7_hari_terakhir':
                    var endDate = new Date(); // Today's date
                    var startDate = new Date();
                    startDate.setDate(endDate.getDate() - 7);
                    var formattedStartDate = formatDate(startDate);
                    var formattedEndDate = formatDate(endDate);
                    table.columns(3).search(formattedStartDate + ' - ' + formattedEndDate).draw();
                    break;
                case 'bulan_ini':
                    var startOfMonth = new Date();
                    startOfMonth.setDate(1);
                    var formattedStartDate = formatDate(startOfMonth);
                    var formattedEndDate = formatDate(new Date());
                    table.columns(3).search(formattedStartDate + ' - ' + formattedEndDate).draw();
                    break;
                default:
                    // Handle filter by specific month
                    table.columns(3).search(range).draw();
                    break;
            }
        }

        function formatDate(date) {
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            return year + '-' + (month < 10 ? '0' + month : month) + '-' + (day < 10 ? '0' + day : day);
        }

        function formatBulan(date) {
            var month = date.getMonth() + 1;
            return (month < 10 ? '0' + month : month);
        }
    </script>
@endsection
