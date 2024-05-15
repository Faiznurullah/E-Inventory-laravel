@extends('dashboard.template.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12"> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tambah Galang Donasi</h6>
        </div>
        <div class="card-body">
           
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Ketersediaan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">{{ $databarang->id }}</th>
                    <td>{{ $databarang->name }}</td>
                    <td>{{ $databarang->jenis_barang }}</td>
                    <td>{{ $databarang->kode_barang }}</td>
                    <td><img class="m-1" src="{{ asset('/foto-barang/'.$databarang->foto) }}" alt="{{ $databarang->name }}" width="30%" height="30%"></td>
                    <td>{{ $databarang->kondisi }}</td>
                    <td>{{ $databarang->tersedia }}</td>
                  </tr>
                  <tr>
                    <td colspan="5"></td>
                    <td colspan="2">
                      <center><a href="/databarang" type="button" class="btn btn-success btn-sm">Kembali</a></center>
                    </td>
                  </tr>
                </tbody>
              </table>
       

  </div>
</div>
</div>
</div>

</div>
                
@endsection

