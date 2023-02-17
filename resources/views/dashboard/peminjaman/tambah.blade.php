@extends('dashboard.template.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12"> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tambah Peminjaman</h6>
        </div>
        <div class="card-body" style="height: 200px;">
           
            <form action="/insertpeminjaman" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Data Barang</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="kode_barang">
                                @foreach($data as $row)
                              <option value="{{ $row->kode_barang }}">{{ $row->name }} | {{ $row->kode_barang }}</option>
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
                        <label for="exampleFormControlSelect1">Foto Surat Peminjaman</label>
                       <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="surat">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      <div class="valid-feedback">
                        @error('surat')
                   <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
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

