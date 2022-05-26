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
                            @if ( Auth::user()->role_id == '3' )
                            <br>
                            @else
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
                            @endif
                        </div>
                        <br>
                        <form action="{{ route('perwalian.update', $perwalian->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="jenis_perwalian">Jenis Perwalian</label>
                                <select name="jenis_perwalian" class="form-control @error('jenis_perwalian') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Perwalian --</option>
                                    <option value="konsultasi" @if ($perwalian->jenis_perwalian == "konsultasi")  {{ 'selected' }} @endif >Konsultasi</option>
                                    <option value="mata kuliah" @if ($perwalian->jenis_perwalian == "mata kuliah")  {{ 'selected' }} @endif>Mata Kuliah</option>
                                </select>

                                <!-- error message untuk content -->
                                @error('semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ old('judul', $perwalian->judul) }}" required>

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
                                    class="form-control @error('isi_perwalian') is-invalid @enderror" required>
                                    {{ old('isi_perwalian', $perwalian->isi_perwalian) }}
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
                                    <option value="Ganjil" @if ($perwalian->semester == "Ganjil")  {{ 'selected' }} @endif >Ganjil</option>
                                    <option value="Genap" @if ($perwalian->semester == "Genap")  {{ 'selected' }} @endif>Genap</option>
                                    <option value="Antara" @if ($perwalian->semester == "Antara")  {{ 'selected' }} @endif>Antara</option>
                                </select>

                                <!-- error message untuk content -->
                                @error('semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                    name="tahun_ajaran" value="{{ old('tahun_ajaran', $perwalian->tahun_ajaran) }}" required>

                                <!-- error message untuk title -->
                                @error('tahun_ajaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <br>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('perwalian.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection