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
          <table id="tabel-parameter" class="rounded overflow-hidden table table-striped table-bordered table-hover display nowrap" cellspacing="0" width="100%" id="dataTables-example">
              <thead>
                  <tr>
                      <th>Id Parameter</th>
                      <th>Nama Parameter</th>
                      <th>Bobot</th>
                      <th>Created At</th>
                      <th>Update At</th>
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
      $('#tabel-parameter').DataTable({
          ajax: {
              url: '{{ url()->current() }}/get'
          },
          columns: [
              {
                  data: 'id_parameter',
                  name: 'id_parameter',
              },
              {
                  data: 'nama_parameter',
                  name: 'nama_parameter'
              },
              {
                  data: 'bobot',
                  name: 'bobot'
              },
              {
                  data: 'created_at',
                  name: 'created_at'
              },
              {
                  data: 'updated_at',
                  name: 'updated_at'
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