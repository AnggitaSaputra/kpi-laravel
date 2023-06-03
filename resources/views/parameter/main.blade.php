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
      <div class="panel-heading">
          <!-- <button type="button" class="btn btn-success">Tambah Data</button> -->
      </div>
      <div class="panel-body">
          <table id="tabel-parameter" class="table table-striped table-bordered table-hover display nowrap" cellspacing="0" width="100%" id="dataTables-example">
              <thead>
                  <tr>
                      <th>Id Parameter</th>
                      <th>Nama Parameter</th>
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