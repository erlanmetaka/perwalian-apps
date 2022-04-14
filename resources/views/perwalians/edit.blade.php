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
                        <form action="{{ route('perwalian.update', $perwalian->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama', $perwalian->nama) }}" required>

                                <!-- error message untuk title -->
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="npm">NPM</label>
                                <input type="text"
                                    name="npm" id="npm"
                                    class="form-control @error('npm') is-invalid @enderror" name="npm" id="npm"
                                    value="{{ old('npm', $perwalian->npm) }}" required>

                                <!-- error message untuk content -->
                                @error('npm')
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
                                    value="{{ old('jurusan', $perwalian->jurusan) }}" required>

                                <!-- error message untuk content -->
                                @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="dosen_id">Nama Dosen Wali</label>
                                <input type="text"
                                    name="dosen_id" id="dosen_id"
                                    class="form-control @error('dosen_id') is-invalid @enderror" name="dosen_id" id="dosen_id"
                                    value="{{ old('dosen_id', $perwalian->dosen->nama) }}" required>

                                <!-- error message untuk content -->
                                @error('dosen_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('perwalian.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection