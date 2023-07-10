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
          <!-- <button type="button" class="btn btn-success">Tambah Data</button> -->
      </div>
      <div class="panel-body">
          <table id="tabel-jabatan" class="rounded overflow-hidden table table-striped table-bordered table-hover display nowrap" cellspacing="0" width="100%" id="dataTables-example">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Jabatan</th>
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
      $('#tabel-jabatan').DataTable({
          ajax: {
              url: '{{ url()->current() }}/get'
          },
          columns: [
              {
                  data: 'id_jabatan',
                  name: 'id_jabatan',
              },
              {
                  data: 'nama_jabatan',
                  name: 'nama_jabatan'
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