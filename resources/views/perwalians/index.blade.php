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
                        @can('create perwalian', Post::class)
                        <a href="{{ route('perwalian.create') }}" class="btn btn-md btn-success mb-3 float-right">Tambah
                            perwalian</a>
                        @endcan

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi Perwalian</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($perwalians as $perwalian)
                                <tr>
                                    <td>{{ $perwalian->created_at }}</td>
                                    <td>{{ $perwalian->judul }}</td>
                                    <td>{{ $perwalian->isi_perwalian }}</td>
                                    <td>{{ $perwalian->semester }}</td>
                                    <td class="text-center">
                                        @can('edit perwalian', Post::class)
                                        <a href="{{ route('perwalian.edit', $perwalian->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                         @endcan

                                         @can('delete perwalian', Post::class)
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('perwalian.destroy', $perwalian->id) }}" method="POST">
                                           
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                        @endcan

                                    </td>
                                </tr>
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