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
          <table id="tabel-departemen" class="rounded overflow-hidden table table-striped table-bordered table-hover display nowrap" cellspacing="0" width="100%" id="dataTables-example">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Departemen</th>
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
      $('#tabel-departemen').DataTable({
          ajax: {
              url: '{{ url()->current() }}/get'
          },
          columns: [
              {
                  data: 'id_departemen',
                  name: 'id_departemen',
              },
              {
                  data: 'nama_departemen',
                  name: 'nama_departemen'
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