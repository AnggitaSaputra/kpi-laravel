@extends('layout.main')
@section('content')
<style type="text/css">
    .pagination li{
     float:left;
     list-style-type:none;
     margin:5px;
    }
    </style>

<div class="row" style="display:flex; justify-content: space-between;" >
  <!-- Advanced Tables -->
  <div class="panel panel-default">
    <a href="{{ url()->current() }}/add" class="btn btn-success datatable-tambah">Tambah Data</a>
      <div class="panel-heading">
      </div>
      <div class="panel-body">
          <table id="tabel-tugas" class="table table-striped table-bordered table-hover display nowrap" cellspacing="0" width="100%" id="dataTables-example">
              <thead>
                  <tr>
                      <th>Id Tugas</th>
                      <th>Id Parameter</th>
                      <th>Id Proyek</th>
                      <th>Nama Tugas</th>
                      <th>Deskripsi</th>
                      <th>Prioritas</th>
                      <th>Status</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Bobot</th>
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
 {{-- SWAL --}}
 @if(Session::has('success'))
 <script>
      Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: '{{ Session::get('success')}}' ,
      })
 </script>
@endif
@if(Session::has('failed'))
 <script>
      Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: '{{ Session::get('failed')}}',
      })
 </script>
@endif
{{-- END OF SWAL --}}

<script>
  $(document).ready(function() {
      $('#tabel-tugas').DataTable({
          ajax: {
              url: '{{ url()->current() }}/get'
          },
          columns: [
              {
                  data: 'id_tugas',
                  name: 'id_tugas',
              },
              {
                  data: 'id_parameter',
                  name: 'id_parameter'
              },
              {
                  data: 'id_proyek',
                  name: 'id_proyek'
              },
              {
                  data: 'nama_tugas',
                  name: 'nama_tugas'
              },
              {
                  data: 'deskripsi',
                  name: 'deskripsi'
              },
              {
                  data: 'prioritas',
                  name: 'prioritas'
              },
              {
                  data: 'status',
                  name: 'status'
              },
              {
                  data: 'tanggal_mulai',
                  name: 'tangga_mulai'
              },
              {
                  data: 'tanggal_selesai',
                  name: 'tanggal_selesai'
              },
              {
                  data: 'bobot',
                  name: 'bobot'
              },
              {
                  data: 'action',
                  name: 'action'
              }
          ],
          rowReorder: {
              selector: 'td:nth-child(2)'
          },
          responsive: true,
      })
  })
</script>


@endsection