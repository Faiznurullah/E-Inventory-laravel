@extends('dashboard.template.app')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">

          <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-success">Pengembalian Barang</h6>
     </div>
     <div class="card-body">

        <form action="/verifikasikembali" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pengembalian barang yang dipinjam:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id">
                            @foreach($data as $row)
                          <option value="{{ $row->id }}">{{ $row->name }} | {{ $row->kode_barang }}</option>
                                                     @endforeach
                        </select>
                      </div>
                      <div class="valid-feedback">
                        @error('kode_barang')
                   <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      </div>
                   </div>

                   <div class="col-md-6">

                    <label for="exampleFormControlSelect1">Foto Barang</label>
                    <div class="custom-file">
                     <input type="file" class="custom-file-input" id="customFile" name="foto">
                     <label class="custom-file-label" for="customFile">Choose file</label>
                     </div>

                  </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <button class="btn btn-success btn-sm" type="submit">Pengembalian Peminjaman</button>
           </div>
            </div>



        </form>
        
      
     </div>
 </div>
        </div>
    </div>
 
 
 
 </div>
                 
 @endsection


