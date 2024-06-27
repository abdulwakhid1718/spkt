@extends('user.layout.app')

@section('main')
    <br>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <h3 class="card-title text-center">Registrasi</h3>
                        </h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/register" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="form-group mandatory">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="text" id="nik"
                                                class="form-control @error('nik') is-invalid @enderror"
                                                placeholder="Masukan NIK" name="nik" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Masukan Nama" name="nama" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="form-group">
                                            <label for="tempat-lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text" id="tempat-lahir"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                placeholder="Masukan Tempat Lahir" name="tempat_lahir" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label d-block">Jenis Kelamin</label>
                                            <div class="radio d-inline mr-2 radio-primary text-black">
                                                <input type="radio" name="jenkel" id="laki" value="Laki-Laki"
                                                    checked />
                                                <label for="laki"><span>Laki-Laki</span></label>
                                            </div>
                                            <div class="radio d-inline radio-primary text-black">
                                                <input type="radio" name="jenkel" id="perempuan" value="Perempuan" />
                                                <label for="perempuan"><span>Perempuan</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label">Agama</label>
                                            <select class="form-select @error('agama') is-invalid @enderror"
                                                aria-label="Default select example" name="agama">
                                                <option value="Islam" selected>Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="form-group mandatory">
                                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                            <input type="text" id="pekerjaan"
                                                class="form-control @error('pekerjaan') is-invalid @enderror"
                                                placeholder="Masukan pekerjaan" name="pekerjaan" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="form-group mandatory">
                                            <label for="no_wa" class="form-label">Nomor WA</label>
                                            <input type="tel" id="no_wa"
                                                class="form-control @error('no_wa') is-invalid @enderror"
                                                placeholder="Masukan No. Whatsapp" name="no_wa" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="form-group mandatory">
                                            <label for="password" class="form-label">Password Akun</label>
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Buatlah password yang kuat" name="password" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="form-group mandatory">
                                            <label for="no_wa" class="form-label">Alamat</label>
                                            <div class="form-floating">
                                                <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="alamat Lengkap Anda" id="alamat"
                                                    name="alamat" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-4 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
