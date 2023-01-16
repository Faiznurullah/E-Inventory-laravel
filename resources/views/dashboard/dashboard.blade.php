@extends('dashboard.template.app')
@section('content')

<div class="container">

    @if (session('Pesan'))
    <div class="alert alert-success" role="alert">
        {{ session('Pesan') }}.
     </div>  
    @endif

     <!-- Content Row -->
     <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jenis Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $x }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Asset Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $y }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-save fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if( Auth::user()->kelas = 'admin')
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $z }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

           <!-- Pending Requests Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Account ID</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">ID-{{ Auth::user()->id }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




  

    <!-- Content Row -->

   <div class="row">
       <div class="col-md-6">
 <!-- Illustrations -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">E-Inventory</h6>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                src="https://i.ibb.co/71P5gKJ/undraw-Investor-update-re-qnuu-removebg-preview.png" alt="...">
        </div>
        <p>Selamat Datang Diaplikasi E-Inventory,
            Aplikasi yang digunakan untuk merekap data barang
            yang bertujuan untuk memudahkan dalam pengelolaan barang.
        </p>
    </div>
</div>
       </div>
       <div class="col-md-6">

      </div>
   </div>



</div>
                
@endsection

