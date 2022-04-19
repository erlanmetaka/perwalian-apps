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
                        <h5 class="card-title">Data Dosen</h5>
                        <br>
                        <a href="{{ route('dosen.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah
                            Dosen</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dosens as $dosen)
                                <tr>
                                    <td>{{ $dosen->nama }}</td>
                                    <td>{{ $dosen->nip }}</td>
                                    <td>{{ $dosen->email }}</td>
                                    <td>{{ $dosen->kontak }}</td>
                                    <td>{{ $dosen->alamat }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('dosen.destroy', $dosen->id) }}" method="POST">
                                            <a href="{{ route('dosen.edit', $dosen->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data Dosen tidak tersedia</td>
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