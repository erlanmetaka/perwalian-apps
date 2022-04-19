@extends('template.app')

@section('content')
    <div class="container mt-5">
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
                        <h5 class="card-title">Data Dosen Wali</h5>
                        <br>
                        <a href="{{ route('dosen_wali.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah
                            Dosen Wali</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Dosen</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dosenWali as $doswal)
                                <tr>
                                    <td>{{ $doswal->dosen->nama }}</td>
                                    <td>{{ $doswal->mahasiswa->nama }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('dosen_wali.destroy', $doswal->id) }}" method="POST">
                                            <a href="{{ route('dosen_wali.edit', $doswal->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data Dosen Wali tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection