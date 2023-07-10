@extends('layout.main')
@section('content')
    <div class="row" style="display:flex; justify-content: space-between;" >
        <!-- Advanced Tables -->
        <div class="panel panel-default">
        <a href="{{ url()->current() }}/add" class="btn btn-success datatable-tambah">Tambah Data</a>
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <table id="tabel-pegawai" class="rounded overflow-hidden table table-striped table-bordered table-hover display nowrap" cellspacing="0" width="100%" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Id Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Departemen</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Tanggal Masuk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- DataTable --}}
                    </tbody>
                </table>
            </div>
            </div>
        </div> 
    </div>

    <script>
        $(document).ready(function() {
            $('#tabel-pegawai').DataTable({
                ajax: {
                    url: '{{ url()->current() }}/get'
                },
                columns: [
                    {
                        data: 'id_pegawai',
                        name: 'id_pegawai',
                    },
                    {
                        data: 'nama_pegawai',
                        name: 'nama_pegawai'
                    },
                    {
                        data: 'id_departemen',
                        name: 'id_departemen'
                    },
                    {
                        data: 'id_jabatan',
                        name: 'id_jabatan'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'telepon',
                        name: 'telepon'
                    },
                    {
                        data: 'tanggal_masuk',
                        name: 'tanggal_masuk'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                rowReorder: {
                    selector: 'td:nth-child(4)'
                },
                responsive: true,
            })
        })
    </script>
@endsection