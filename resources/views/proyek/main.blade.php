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
          <table id="tabel-proyek" class="table table-striped table-bordered table-hover display nowrap" cellspacing="0" width="100%" id="dataTables-example">
              <thead>
                  <tr>
                      <th>Id Proyek</th>
                      <th>Nama Proyek</th>
                      <th>Deskripsi Proyek </th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Estimasi Durasi</th>
                      <th>Status</th>
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
      $('#tabel-proyek').DataTable({
          ajax: {
              url: '{{ url()->current() }}/get'
          },
          columns: [
              {
                  data: 'id_proyek',
                  name: 'id_proyek',
              },
              {
                  data: 'nama_proyek',
                  name: 'nama_proyek'
              },
              {
                  data: 'deskripsi_proyek',
                  name: 'deskripsi_proyek'
              },
              {
                  data: 'tanggal_mulai',
                  name: 'tanggal_mulai'
              },
              {
                  data: 'tanggal_selesai',
                  name: 'tanggal_selesai'
              },
              {
                  data: 'estimasi_durasi',
                  name: 'estimasi_durasi'
              },
              {
                  data: 'status',
                  name: 'status'
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