@extends('user.layout.app')

@section('main')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            @method('post')
                            <div class="form-group my-3">
                                <label for="nik">NIK</label>
                                <input id="nik" type="text"
                                    class="form-control @error('nik') is-invalid @enderror mt-1" name="nik"
                                    value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <button type="button" class="btn btn-link btn-sm" id="showPasswordBtn"><i
                                                    class="bi bi-eye"></i></button>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small>Belum punya akun? <a href="/register">Daftar disini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
