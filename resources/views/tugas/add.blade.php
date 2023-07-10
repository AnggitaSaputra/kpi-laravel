@extends('layout.main')

@section('content')
        <form action="{{ url()->current() }}/simpan" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-4">
                <label for="inputParameter" class="form-label">Parameter</label>
                <select id="inputParameter" class="form-control selectpicker" data-live-search="true" title="Pilih Parameter.." name="id_parameter">
                    {{-- For Each Data Input here --}}
                    @foreach ($parameter as $item)
                        <option data-tokens="{{ $item->nama_parameter }}" value="{{ $item->id_parameter }}">{{ $item->nama_parameter }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputProyek" class="form-label">Proyek</label>
                <select id="inputProyek" class="form-control selectpicker" data-live-search="true" title="Pilih Proyek.." name="id_proyek">
                    {{-- For Each Data Input here --}}
                    @foreach ($proyek as $item)
                        <option data-tokens="{{ $item->nama_proyek }}" value="{{ $item->id_proyek }}">{{ $item->nama_proyek }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label for="inputNamaTugas" class="form-label">Nama Tugas</label>
                <input type="text" class="form-control" id="inputNamaTugas" name="nama_tugas">
            </div>
            <div class="col-12">
                <label for="inputDeskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="inputDeskripsi" name="deskripsi">
            </div>
            <div class="col-12">
                <label for="inputPrioritas" class="form-label">Prioritas</label>
                <input type="text" class="form-control" id="inputPrioritas" name="prioritas">
            </div>
            <div class="col-12">
                <label for="inputStatus" class="form-label">Status</label>
                <input type="text" class="form-control" id="inputStatus" name="status">
            </div>
            <div class="col-12">
                <label for="inputTanggalMulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="inputTanggalMulai" name="tanggal_mulai">
            </div>
            <div class="col-12">
                <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="inputTanggalSelesai" name="tanggal_selesai">
            </div>
            <div class="col-12">
                <label for="inputBobot" class="form-label">Bobot</label>
                <input type="text" class="form-control" id="inputBobot" name="bobot">
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
            $('#inputParameter').selectpicker();
            $('#inputProyek').selectpicker();
        </script>
@endsection