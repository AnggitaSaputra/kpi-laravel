@extends('layout.main')

@section('content')
        <form action="pegawai/simpan" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-4">
                <label for="inputDepartemen" class="form-label">Departemen</label>
                <select id="inputDepartemen" class="form-control selectpicker" data-live-search="true" title="Pilih Departemen..">
                    {{-- For Each Data Input here --}}
                    @foreach ($departemen as $item)
                        <option data-tokens="{{ $item->nama_departemen }}" value="{{ $item->id_departemen }}">{{ $item->nama_departemen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputPerusahaan" class="form-label">Perusahaan</label>
                <select id="inputPerusahaan" class="form-control selectpicker" data-live-search="true" title="Pilih Perusahaan..">
                    {{-- For Each Data Input here --}}
                    @foreach ($perusahaan as $item)
                        <option data-tokens="{{ $item->nama_perusahaan }}" value="{{ $item->id_perusahaan }}">{{ $item->nama_perusahaan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputJabatan" class="form-label">Jabatan</label>
                <select id="inputJabatan" class="form-control selectpicker" data-live-search="true" title="Pilih Jabatan..">
                    {{-- For Each Data Input here --}}
                    @foreach ($jabatan as $item)
                        <option data-tokens="{{ $item->nama_jabatan }}" value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label for="inputNamaPegawai" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="inputNamaPegawai">
            </div>
            <div class="col-md-6">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputUsername">
            </div>
            <div class="col-md-6">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="text" class="form-control" id="inputPassword">
            </div>
            <div class="col-12">
                <label for="formFile" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="col-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="text" class="form-control" id="inputEmail">
            </div>
            <div class="col-md-6">
                <label for="inputAlamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="inputAlamat">
            </div>
            <div class="col-md-3">
                <label for="inputTelpon" class="form-label">Telpon</label>
                <input type="text" class="form-control" id="inputTelpon">
            </div>
            <div class="col-md-3">
                <label for="inputKTP" class="form-label">No KTP</label>
                <input type="text" class="form-control" id="inputKTP">
            </div>
            <div class="col-12">
                <label for="inputTanggalMasuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="inputTanggalMasuk">
            </div>
            <div class="col-12 d-flex flex-row gap-3">
                <button class="btn btn-danger">
                    <i class='bx bx-trash'></i>
                </button>
                <input type="submit" value="Cancel" class="btn btn-danger flex-grow-1" >
                <input type="submit" value="Submit" class="btn btn-success flex-grow-1">
            </div>
        </form>
        <script>
            $('#inputDepartemen').selectpicker();
        </script>
@endsection