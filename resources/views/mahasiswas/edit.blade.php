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
                        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>

                                <!-- error message untuk title -->
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text"
                                    name="nim" id="nim"
                                    class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim"
                                    value="{{ old('nim', $mahasiswa->nim) }}" required>

                                <!-- error message untuk content -->
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text"
                                    name="jurusan" id="jurusan"
                                    class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan"
                                    value="{{ old('jurusan', $mahasiswa->jurusan) }}" required>

                                <!-- error message untuk content -->
                                @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text"
                                    name="alamat" id="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                    value="{{ old('alamat', $mahasiswa->alamat) }}" required>

                                <!-- error message untuk content -->
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text"
                                    name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                    value="{{ old('email', $mahasiswa->email) }}" required>

                                <!-- error message untuk content -->
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input type="text"
                                    name="kontak" id="kontak"
                                    class="form-control @error('kontak') is-invalid @enderror" name="kontak" id="kontak"
                                    value="{{ old('kontak', $mahasiswa->kontak) }}" required>

                                <!-- error message untuk content -->
                                @error('kontak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection