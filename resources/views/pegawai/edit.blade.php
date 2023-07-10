@extends('layout.main')
@section('content')
    

<form action="{{ url()->current()}}/simpan"  method="POST" enctype="multipart/form-data" class="row g-3">
    @foreach($pegawai as $row) 
    @csrf
    <div class="col-md-4">
        <label for="inputDepartemen" class="form-label">Departemen</label>
        <select id="inputDepartemen" class="form-control selectpicker" data-live-search="true" title="Pilih Departemen.." name="id_departemen">
            {{-- For Each Data Input here --}}
            @foreach ($departemen as $item)
                <option 
                    data-tokens="{{ $item->nama_departemen }}" 
                    @if ($row->id_departemen == $item->id_departemen)
                        selected
                    @endif
                    value="{{ $item->id_departemen }}" >{{ $item->nama_departemen }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="inputPerusahaan" class="form-label">Perusahaan</label>
        <select id="inputPerusahaan" class="form-control selectpicker" data-live-search="true" title="Pilih Perusahaan.." name="id_perusahaan">
            {{-- For Each Data Input here --}}
            @foreach ($perusahaan as $item)
                <option
                    data-tokens="{{ $item->nama_perusahaan }}" 
                    @if ($row->id_perusahaan == $item->id_perusahaan)
                        selected
                    @endif
                    value="{{ $item->id_perusahaan }}">{{ $item->nama_perusahaan }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="inputJabatan" class="form-label">Jabatan</label>
        <select id="inputJabatan" class="form-control selectpicker" data-live-search="true" title="Pilih Jabatan.." name="id_jabatan">
            {{-- For Each Data Input here --}}
            @foreach ($jabatan as $item)
                <option 
                data-tokens="{{ $item->nama_jabatan }}" 
                @if ($row->id_jabatan == $item->id_jabatan)
                    selected
                @endif
                value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label for="inputNamaPegawai" class="form-label">Nama Pegawai</label>
        <input type="text" class="form-control" id="inputNamaPegawai"  required value="{{$row->nama_pegawai}}" name="nama_pegawai">
    </div>
    <div class="col-md-6">
        <label for="inputUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="inputUsername"  required value="{{$row->username}}" name="username">
    </div>
    <div class="col-md-6">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="text" class="form-control" id="inputPassword"  required value="{{$row->password}}"name="password">
    </div>
    <div class="col-12">
        <label for="formFile" class="form-label">Gambar</label>
        <input class="form-control" type="file" id="formFile" required value="" name="pic" >
    </div>
    <div class="col-12">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="text" class="form-control" id="inputEmail" required value="{{$row->email}}" name="email">
    </div>
    <div class="col-md-6">
        <label for="inputAlamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="inputAlamat"  required value="{{$row->alamat}}" name="alamat">
    </div>
    <div class="col-md-3">
        <label for="inputTelepon" class="form-label">Telpon</label>
        <input type="text" class="form-control" id="inputTelepon"  required value="{{$row->telepon}}" name="telepon">
    </div>
    <div class="col-md-3">
        <label for="inputKTP" class="form-label">No KTP</label>
        <input type="text" class="form-control" id="inputKTP"  required value="{{$row->no_ktp}}" name="no_ktp">
    </div>
    <div class="col-12">
        <label for="inputTanggalMasuk" class="form-label">Tanggal Masuk</label>
        <input type="date" class="form-control" id="inputTanggalMasuk" required value="{{ \Carbon\Carbon::parse($row->tanggal_masuk)->isoFormat('YYYY-MM-DD')}}" name="tanggal_masuk">
    </div>
    <div class="col-12 d-flex flex-row gap-3">
        <button class="btn btn-danger">
            <i class='bx bx-trash'></i>
        </button>
        <input type="submit" value="Cancel" class="btn btn-danger flex-grow-1" >
        <input type="submit" value="Submit" class="btn btn-success flex-grow-1">
    </div>
</form>
@endforeach 
<script>
    $('#inputDepartemen').selectpicker();
</script>

@endsection