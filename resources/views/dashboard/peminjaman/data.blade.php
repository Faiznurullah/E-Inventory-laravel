@extends('dashboard.template.app')
@section('content')

<div class="container">

   <div class="row">
       <div class="col-md-12">
 <!-- Illustrations -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Data Peminjaman</h6>
    </div>
    <div class="card-body">
       
        @if (session('Pesan'))
        <div class="alert alert-success" role="alert">
            {{ session('Pesan') }}.
         </div>  
        @endif


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Barang</th>
                        <th>Kode Barang</th>
                        <th>Surat/Foto</th>
                        <th>Situasi</th>
                        <th>Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>          
                  @foreach($peminjaman as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->name }} ({{ $row->peminjam }})</td>
                        <td>{{ $row->kode_barang }}</td>
                        <td><center>
                            @if($row->tersedia == 'ya')

                            <a href= "{{  asset('/surat-peminjaman/'.$row->surat) }}" class="btn btn-success btn-sm" target="_blank">Lihat surat</a>

                            @elseif($row->tersedia == 'tidak')
                           
                            <a href= "{{  asset('/surat-peminjaman/'.$row->surat) }}" class="btn btn-success btn-sm" target="_blank">Lihat surat</a>


                           @elseif($row->tersedia == 'kembali')
                           
                           <a href = "{{  asset('/foto-kembali/'.$row->foto) }}" class="btn btn-success btn-sm" target="_blank"> 
                             Lihat foto
                            </a>
                       
                           @elseif($row->tersedia == 'selesai')

                           Proses Selesai

                          @endif
                        </center></td>
                        <td>
                            @if($row->tersedia == 'ya')

                            Proses Verifikasi

                            @elseif($row->tersedia == 'tidak')
                           
                           Boleh Dipinjam

                           @elseif($row->tersedia == 'kembali')

                           Proses Pengembalian

                           @elseif($row->tersedia == 'selesai')

                           Proses Selesai

                          @endif
                        </td>
                        <td>
                            @if(Auth::user()->kelas == 'admin')

                               @if($row->tersedia === 'ya')

                               <form action="/verifikasipeminjaman/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                                @csrf                
                                <button class="btn btn-success btn-sm" type="submit">Verifikasi Peminjaman</button>
                               </form>

                               @elseif($row->tersedia === 'tidak')
                                
                                <button class="btn btn-success btn-sm">Sudah Verifikasi</button>

                                  
                               @elseif($row->tersedia === 'kembali')

                               <form action="/verifikasipengembalian/{{ $row->id }}" method="POST" enctype="multipart/form-data">
                                @csrf   
                               <button class="btn btn-success btn-sm">Verifikasi Pengembalian</button>
                               </form>

                               @elseif($row->tersedia == 'selesai')

                               <button class="btn btn-success btn-sm">Peminjaman selesai</button>


                               @else

                               @endif



                            @elseif( Auth::user()->kelas == 'user' )

                                 @if($row->tersedia == 'ya')

                                 <button class="btn btn-success btn-sm">Belum Diverifikasi</button>

                                 @elseif($row->tersedia == 'tidak')
                                
                                <button class="btn btn-success btn-sm">Sudah Verifikasi</button>

                                @elseif($row->tersedia === 'kembali')

                                <button class="btn btn-success btn-sm">Belum Verifikasi</button>

                                @elseif($row->tersedia === 'selesai')
                                <button class="btn btn-success btn-sm">Peminjaman Selesai</button>

                               @endif
                      
                            @endif
                          
                        </td>
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

