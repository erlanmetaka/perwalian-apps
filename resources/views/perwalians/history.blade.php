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
                        <h5 class="card-title">Data Perwalian</h5>
                        {{-- <div class="col-sm-1">
                            <p class="card-text">Nama Dosen Wali</p>       
                        </div>
                        <div class="col-sm-3">
                            <p class="card-text">: {{ Auth::User()->name }}</p>
                        </div>
                        <br> --}}
                        {{-- @can('create perwalian', Post::class)
                            @if (Auth::user()->role_id == 1)
                            <a href="{{ route('perwalian.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah
                                perwalian</a>
                            @endif
                        @endcan --}}
                                
                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Dosen Wali</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Jenis Perwalian</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi Perwalian</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Tahun Ajaran</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($perwalians as $perwalian)
                                @if ( $perwalian->dosenWali->dosen_id == Auth::user()->user_id  )
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($perwalian->updated_at)->format('d M Y H:i') }}</td>
                                    <td>{{ $perwalian->dosenWali->dosen->nama }}</td>
                                    <td>{{ $perwalian->dosenWali->mahasiswa->nama }}</td>
                                    <td>{{ $perwalian->jenis_perwalian }}</td>
                                    <td>{{ $perwalian->judul }}</td>
                                    <td>{{ $perwalian->isi_perwalian }}</td>
                                    <td>{{ $perwalian->semester }}</td>
                                    <td>{{ $perwalian->tahun_ajaran }}</td>
                                    {{-- <td class="text-center">
                                        @can('edit perwalian', Post::class)
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('perwalian.destroy', $perwalian->id) }}" method="POST">
                                            <a href="{{ route('perwalian.edit', $perwalian->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                        @endcan
                                        @can('delete perwalian', Post::class)
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        @endcan
                                        </form>
                                    </td> --}}
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data perwalian tidak tersedia</td>
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