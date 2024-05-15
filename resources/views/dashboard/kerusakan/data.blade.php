@extends('dashboard.template.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12"> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Barang Rusak</h6>
        </div>
        <div class="card-body">
       
            @if (session('Pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('Pesan') }}.
             </div>  
            @endif

            <div class="row mb-3">
                <div class="col-md-6">
                    @if(Auth::user()->kelas == 'admin')
                    <a href="/downloadpdfbarangrusak" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Download PDF</a>
                            @elseif(Auth::user()->kelas == 'user')
                             
                            @endif
            
            </div>
        </div>


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Jenis Barang</th>
                            <th>Kondis</th>
                            <th>Kode Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>          
                      @foreach($kerusakan as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->jenisBarang->name }}</td>
                            <td>{{ $row->kondisi }}</td>
                            <td>{{ $row->kode_barang }}</td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>

            </div>

     

  </div>
</div>
</div>
</div>

</div>
                
@endsection

