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
                        <h5 class="card-title">Form Tambah Mahasiswa</h5>
                        <br>
                        <form action="{{ route('mahasiswa.store') }}" method="POST">
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
                                <label for="nim">NIM</label>
                                <input type="text" name="nim" id="nim"
                                    class="form-control @error('nim') is-invalid @enderror"
                                    valu="{{ old('nim') }}" required>

                                <!-- error message untuk content -->
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                                    <option value="">-- Pilih Jurusan --</option>
                                    <option value="SI - Reguler Pagi">SI - Reguler Pagi</option>
                                    <option value="SI - Reguler Sore">SI - Reguler Sore</option>
                                </select>

                                <!-- error message untuk content -->
                                @error('jurusan')
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
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ old('alamat') }}" required>

                                <!-- error message untuk title -->
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection