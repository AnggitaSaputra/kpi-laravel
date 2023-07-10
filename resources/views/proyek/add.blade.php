@extends('layout.main')
@section('content')

<form action="{{ url()->current() }}/simpan" method="POST" enctype="multipart/form-data" class="row g-3">
    @csrf
    <div class="col-12">
        <label for="inputNamaProyek" class="form-label">Nama Proyek</label>
        <input type="text" class="form-control" id="inputNamaProyek" name="nama_proyek">
    </div>
    <div class="col-12">
        <label for="inputDeskripsi" class="form-label">Deskripsi Proyek</label>
        <input type="text" class="form-control" id="inputDeskripsi" name="deskripsi_proyek">
    </div>
    <div class="col-md-4">
        <label for="inputTanggalMulai" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" id="inputTanggalMulai" name="tanggal_mulai">
    </div>
    <div class="col-md-4">
        <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai</label>
        <input type="date" class="form-control" id="inputTanggalSelesai" name="tanggal_selesai">
    </div>
    <div class="col-md-4">
        <label for="inputDeskripsi" class="form-label">Estimasi Durasi</label>
        <input type="time" class="form-control" id="inputDurasi" name="estimasi_durasi">
    </div>
    <div class="col-12">
        <label for="inputStatus" class="form-label">Status</label>
        <input type="text" class="form-control" id="inputstatus" name="status">
    </div>
    <div class="col-12">
        <label for="inputDepartemen" class="form-label">Departemen</label>
        <select id="inputDepartemen" class="form-control selectpicker" data-live-search="true" title="Pilih Departemen.." name="id_departemen">
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
<script>
    const tanggalMulai = document.querySelector('#inputTanggalMulai')
    const tanggalSelesai = document.querySelector('#inputTanggalSelesai')
    const estimasiDurasi = document.querySelector('#inputDurasi')

    const getMinute = () => {
        if (tanggalMulai.value == "" || tanggalSelesai.value == ""){
            estimasiDurasi.value = ""
            return
        }
        if (tanggalMulai.valueAsDate > tanggalSelesai.valueAsDate) {
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan Tanggal',
                text: 'Tanggal mulai lebih besar dari tanggal selesai!'
            })
            tanggalMulai.value = ""
            estimasiDurasi.value = ""
            return
        }
        var diffMs = (tanggalSelesai.valueAsDate - tanggalMulai.valueAsDate);
        
        var diffMins = millisToMinutes(diffMs)
        estimasiDurasi.value = diffMins
    }
    function millisToMinutes(millis) {
        var minutes = Math.floor(millis / 60000);
        return minutes
    }
    tanggalMulai.addEventListener('change', getMinute)
    tanggalSelesai.addEventListener('change', getMinute)
</script>
@endsection