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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Form Perwalian</h5>
                                    <div class="col-sm-1">
                                    <p class="card-text">Nama Mahasiswa</p>
                                    <p class="card-text">NIM Mahasiswa</p>
                                    <p class="card-text">Nama Dosen Wali</p>       
                                    </div>
                                    <div class="col-sm-3">
                                    <p class="card-text">: {{ Auth::User()->name }}</p>
                                    <p class="card-text">: {{ $dosenWali[0]->mahasiswa->nim }}</p>
                                    <p class="card-text">: {{ $dosenWali[0]->dosen->nama }}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                            
                        <br>
                        <form action="{{ route('perwalian.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ old('judul') }}" required>

                                <!-- error message untuk title -->
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="isi_perwalian">Isi Perwalian</label>
                                <textarea name="isi_perwalian" id="isi_perwalian"
                                    class="form-control @error('isi_perwalian') is-invalid @enderror"
                                    value="{{ old('isi_perwalian') }}" required>
                                </textarea>
                                <!-- error message untuk content -->
                                @error('isi_perwalian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <select name="semester" class="form-control @error('semester') is-invalid @enderror">
                                    <option value="">-- Pilih Semester --</option>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                    <option value="Antara">Antara</option>
                                </select>

                                <!-- error message untuk content -->
                                @error('semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('perwalian.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

