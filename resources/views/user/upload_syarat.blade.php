@extends('user.layout.app')

@section('title', 'Dashboard')

@section('main')
    <div class="container">
        <section style="margin-top: 60px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Dokumen Persyaratan</h6>
                        </div>
                        <div class="card-body">
                            <form action="/upload_bukti_laporan" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_laporan" value="{{ $id_laporan }}">

                                <div class="form-group my-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>ID Laporan</label>
                                        </div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="{{ $id_laporan }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                @foreach ($dokumen_persyaratan as $dokumen)
                                    <div class="form-group my-2">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="{{ $dokumen }}">{{ $dokumen }}</label>
                                            </div>
                                            <div class="col-md-1">:</div>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control-file" id="{{ $dokumen }}"
                                                    name="dokumen[]" multiple required>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary my-2">
                                    <i class="bi bi-cloud-arrow-up"></i> Unggah
                                </button><a href="/" class="btn btn-secondary my-2 ml-2"> Skip
                                </a><br>
                                <small class="text-danger text-small">* Anda dapat skip langkah ini, dan membawa berkas
                                    persyaratan
                                    secara langsung ke polsek</small>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Section Title -->
        </section>
    </div>
@endsection
