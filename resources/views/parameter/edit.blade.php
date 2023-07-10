@extends('layout.main')
@section('content')
    
<form action="{{ url()->current()}}/simpan"  method="POST" enctype="multipart/form-data" class="row g-3">
    @foreach($parameter as $row) 
    @csrf
    <div class="col-12">
        <label for="inputNamaparameter" class="form-label">Nama parameter</label>
        <input type="text" class="form-control" id="inputNamaparameter"  required value="{{$row->nama_parameter}}" name="nama_parameter">
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
    $('#inputParameter').selectpicker();
</script>

@endsection