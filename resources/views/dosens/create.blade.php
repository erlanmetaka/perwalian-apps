@extends('template.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Dosen</h5>
                        <br>
                        <form action="{{ route('dosen.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" required>

                                <!-- error message untuk title -->
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" id="nip"
                                    class="form-control @error('nip') is-invalid @enderror"
                                    valu="{{ old('nip') }}" required>

                                <!-- error message untuk content -->
                                @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    valu="{{ old('email') }}" required>

                                <!-- error message untuk content -->
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror"
                                    name="kontak" value="{{ old('kontak') }}" required>

                                <!-- error message untuk title -->
                                @error('kontak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ old('alamat') }}" required> </textarea>

                                <!-- error message untuk title -->
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <br>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('dosen.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection