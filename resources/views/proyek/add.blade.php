@extends('layout.main')
@section('content')

<form action="pegawai/simpan" method="POST" enctype="multipart/form-data" class="row g-3">
    @csrf
    <div class="col-12">
        <label for="inputNamaProyek" class="form-label">Nama Proyek</label>
        <input type="text" class="form-control" id="inputNamaProyek">
    </div>
    <div class="col-12">
        <label for="inputDeskripsi" class="form-label">Deskripsi Proyek</label>
        <input type="text" class="form-control" id="inputBobot">
    </div>
    <div class="col-md-4">
        <label for="inputTanggalMulai" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" id="inputTanggalMulai">
    </div>
    <div class="col-md-4">
        <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai</label>
        <input type="date" class="form-control" id="inputTanggalSelesai">
    </div>
    <div class="col-md-4">
        <label for="inputDeskripsi" class="form-label">Estimasi Durasi</label>
        <input type="time" class="form-control" id="inputDurasi">
    </div>
    <div class="col-12">
        <label for="inputStatus" class="form-label">Status</label>
        <input type="text" class="form-control" id="inputBobot">
    </div>
    <div class="col-12">
        <label for="inputDepartemen" class="form-label">Departemen</label>
        <select id="inputDepartemen" class="form-control selectpicker" data-live-search="true" title="Pilih Departemen..">
            {{-- For Each Data Input here --}}
            @foreach ($departemen as $item)
                <option data-tokens="{{ $item->nama_departemen }}" value="{{ $item->id_departemen }}">{{ $item->nama_departemen }}</option>
            @endforeach
        </select>
    </div>   

    <div class="col-12 d-flex flex-row gap-3">
        <button class="btn btn-danger">
            <i class='bx bx-trash'></i>
        </button>
        <input type="submit" value="Cancel" class="btn btn-danger flex-grow-1" >
        <input type="submit" value="Submit" class="btn btn-success flex-grow-1">
    </div>
</form>










{{-- <div style="display: flex; justify-content: center; align-items: center; width:100%; gap: 50px; flex-direction: column;">
    <form action="proyek/simpan" method="POST" enctype="multipart/form-data" style="width: 60%; padding: 50px 50px 50px 50px; border-radius: 10px; display: flex; flex-direction: column; height: 80vh;  overflow-y: scroll;">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Nama Proyek</label>
            <input type="text" class="form-control" id="exampleFormControlInput3" name="id_perusahaan" value="1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Deskripsi Proyek</label>
            <input type="text" class="form-control" id="exampleFormControlInput4" name="id_jabatan" value="3">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput5" class="form-label">Tanggal Mulai</label>
            <input type="text" class="form-control" id="exampleFormControlInput5" name="nama_pegawai">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput6" class="form-label">Tanggal Selesai</label>
            <input type="text" class="form-control" id="exampleFormControlInput6" name="username">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput7" class="form-label">Estimasi Durasi</label>
            <input type="text" class="form-control" id="exampleFormControlInput7" name="password">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput8" class="form-label">Status</label>
            <input type="text" class="form-control" id="exampleFormControlInput8" name="email">
        </div>
        <input type="submit" value="Submit">
    </form>
</div> --}}
@endsection