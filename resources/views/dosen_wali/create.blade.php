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

                        <form action="{{ route('dosen_wali.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="dosen_id">Nama Dosen</label>
                                <select name="dosen_id" class="form-control @error('dosen_id') is-invalid @enderror">
                                    <option value="">-- Pilih Dosen --</option>
                                    @foreach ($dosens as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk title -->
                                @error('dosen_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mahasiswa_id">Nama Mahasiswa</label>
                                <select name="mahasiswa_id" class="form-control @error('mahasiswa_id') is-invalid @enderror">
                                    <option value="">-- Pilih Mahasiswa --</option>
                                    @foreach ($mahasiswas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk content -->
                                @error('mahasiswa_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('dosen_wali.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection