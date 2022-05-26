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

                        {{-- <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Jurusan</th>
                                    <th>Email</th>
                                    <th>Kontak</th>
                                    <th>Alamat</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // hapus();
        // $.noConflict();
       $(function () {
          
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('mahasiswa.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'nama', name: 'nama'},
                  {data: 'nim', name: 'nim'},
                  {data: 'jurusan', name: 'jurusan'},
                  {data: 'email', name: 'email'},
                  {data: 'kontak', name: 'kontak'},
                  {data: 'alamat', name: 'alamat'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });

            
        });
        function hapus(e) {
                var url = '{{ route("mahasiswa.destroy", ":id") }}';
                    url = url.replace(':id', e);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                Swal.fire({
                    title             : "Apakah Anda Yakin ?",
                    text              : "Data Yang Sudah Dihapus Tidak Bisa Dikembalikan!",
                    icon              : "warning",
                    showCancelButton  : true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor : "#d33",
                    confirmButtonText : "Ya, Tetap Hapus!"
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url    : url,
                            type   : "delete",
                            success: function(data) {
                                $('.yajra-datatable').DataTable().ajax.reload();
                            }
                        })
                    }
                })
            }
    </script>
    @endsection

    @push('javascripts')
    @endpush