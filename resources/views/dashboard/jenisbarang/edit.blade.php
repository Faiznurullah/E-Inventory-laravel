@extends('dashboard.template.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12"> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Edit Data</h6>
        </div>
        <div class="card-body" style="height: 200px;">
           
            <form action="/updatejenisbarang/{{ $jenisbarang->id }}" method="POST" enctype="multipart/form-data">
                @csrf

   <div class="row">
       <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Nama Jenis Barang:</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror is-valid" value="{{ $jenisbarang->name }}" name="name" id="exampleFormControlInput1" placeholder="Jenis Barang Contoh:Kursi">
        <div class="valid-feedback">
          @error('name')
<div class="alert alert-danger">{{ $message }}</div>
       @enderror
        </div>
       </div>
       
   </div>

   <div class="row">
    <div class="col-md-6">
        <div class="d-grid gap-2 mt-4">
            <button class="btn btn-success" type="submit">Edit Data</button>
          </div>
       </div>
   </div>

            </form>

  </div>
</div>
</div>
</div>

</div>
                
@endsection


