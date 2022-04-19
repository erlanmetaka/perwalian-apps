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
                        <h5 class="card-title">Data Mahasiswa</h5>
                        <br>
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah
                            Mahasiswa</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->jurusan }}</td>
                                    <td>{{ $mahasiswa->email }}</td>
                                    <td>{{ $mahasiswa->kontak }}</td>
                                    <td>{{ $mahasiswa->alamat }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data mahasiswa tidak tersedia</td>
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