@extends('user.layout.app')

@section('title', 'Buat Laporan')

@section('main')
    <div class="container">
        <section style="margin-top: 60px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h5 class="card-title">Benda & Kronologi</h5>
                        </div>
                        <div class="card-body">
                            <form action="/laporan" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="ktp" value="KTP" />
                                            <label for="ktp"><span>KTP</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="atm"
                                                value="Buku Tabungan/ATM" />
                                            <label for="atm"><span>Buku Tabungan/ATM</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="sim" value="SIM" />
                                            <label for="sim"><span>SIM</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="bpjs" value="BPJS" />
                                            <label for="bpjs"><span>BPJS</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="stnk" value="STNK" />
                                            <label for="stnk"><span>STNK</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="ijasah"
                                                value="Ijasah/STTB" />
                                            <label for="ijasa"><span>Ijasah/STTB</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="gadai"
                                                value="Bukti Gadai" />
                                            <label for="gadai"><span>Bukti Gadai</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="bpkb"
                                                value="Resi Pengambilan BPKB" />
                                            <label for="bpkb"><span>Resi Pengambilan BPKB</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="npwp" value="NPWP" />
                                            <label for="npwp"><span>NPWP</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="akte"
                                                value="Akte Kelahiran" />
                                            <label for="akte"><span>Akte Kelahiran</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="buku_nikah"
                                                value="Buku Nikah" />
                                            <label for="buku_nikah"><span>Buku Nikah</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="bank"
                                                value="Kroya BANK" />
                                            <label for="bank"><span>Kroya BANK</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="ktm"
                                                value="Kartu Tanda Mahasiswa" />
                                            <label for="ktm"><span>Kartu Tanda Mahasiswa</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="radio radio-primary text-black">
                                            <input type="radio" name="berkas_kehilangan" id="emas"
                                                value="Surat Pembelian Emas" />
                                            <label for="emas"><span>Surat Pembelian Emas</span></label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tanggal_kejadian" class="form-label">Tanggal Kejadian</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_kejadian') is-invalid @enderror"
                                                id="tanggal_kejadian" name="tanggal_kejadian">
                                            @error('tanggal_kejadian')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempat_kejadian" class="form-label">Tempat Kejadian</label>
                                            <input type="text"
                                                class="form-control @error('tempat_kejadian') is-invalid @enderror"
                                                id="tempat_kejadian" name="tempat_kejadian">
                                            @error('tempat_kejadian')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="kronologi"
                                                class="form-label @error('kronologi') is-invalid @enderror">Kronologi</label>
                                            <textarea class="form-control" id="kronologi" name="kronologi" rows="3"></textarea>
                                            @error('kronologi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Lanjut
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Section Title -->
        </section>
    </div>
@endsection
