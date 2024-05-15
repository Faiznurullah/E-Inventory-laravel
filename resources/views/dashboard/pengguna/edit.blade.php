@extends('dashboard.template.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12"> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tambah Akun</h6>
        </div>
        <div class="card-body">
           
            <form action="/updatepengguna/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf

   <div class="row">
       <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Nama Pengguna:</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror is-valid" value="{{ $data->name }}" name="name" id="exampleFormControlInput1" placeholder="Nama pengguna">
        <div class="valid-feedback">
          @error('name')
   <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        </div>
       </div>

       <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Email Pengguna:</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror is-valid" name="email" value="{{ $data->email }}" id="exampleFormControlInput1" placeholder="Email pengguna">
        <div class="valid-feedback">
          @error('email')
   <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        </div>
       </div>
       
   </div>

   <div class="row mt-3">
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Password:</label>
        <input type="password" class="form-control  @error('password') is-invalid @enderror is-valid" name="password" id="exampleFormControlInput1" placeholder="Password pengguna">
        <div class="valid-feedback">
          @error('password')
   <div class="alert alert-danger">{{ $message }}</div>
       @enderror
        </div>
       </div>

       <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Level pengguna</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kelas">
              <option value="user">Pengguna</option>
              <option value="admin">admin</option>
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

