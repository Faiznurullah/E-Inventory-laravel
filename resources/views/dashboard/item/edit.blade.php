@extends('dashboard.template.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12"> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Edit Data</h6>
        </div>
        <div class="card-body">
           
            <form action="/updatedatabarang/{{ $databarang->id }}" method="POST" enctype="multipart/form-data">
                @csrf

   <div class="row">

       <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Nama Data Barang:</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror is-valid" value="{{ $databarang->name }}" name="name" id="exampleFormControlInput1" placeholder="Jenis Barang Contoh:Kursi">
        <div class="valid-feedback">
          @error('name')
     <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        </div>
       </div>

       <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Jenis Data Barang</label>
            <select class="form-control" id="exampleFormControlSelect1" name="jenis_barang">
                @foreach($jenisbarang as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="valid-feedback">
            @error('jenis_barang')
       <div class="alert alert-danger">{{ $message }}</div>
         @enderror
          </div>
       </div>
       
   </div>


   <div class="row">

    <div class="col-md-6">
    <label for="exampleFormControlSelect1">Foto Data Barang</label>
   <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="foto">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kondisi Data Barang</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kondisi">
              <option value="baik">Baik</option>
              <option value="rusak">Rusak</option>
            </select>
          </div>
        
    </div>
   </div>

   <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Ketersediaan Data Barang</label>
            <select class="form-control" id="exampleFormControlSelect1" name="tersedia">
              <option value="ya">Tersedia</option>
              <option value="tidak">Tidak Tersedia</option>
            </select>
          </div>
      </div>

   </div>

   <div class="row">
    <div class="col-md-6">
        <div class="d-grid gap-2 mt-4">
            <button class="btn btn-success" type="submit">Kirim Data</button>
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

