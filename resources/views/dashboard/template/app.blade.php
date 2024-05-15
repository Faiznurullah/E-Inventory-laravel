<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> {{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{!! asset('vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! asset('css/dash/sb-admin-2.min.css') !!}" rel="stylesheet">
        <!-- Custom styles for this page -->
    <link href="{!! asset('vendor/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">

     
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-box"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

              <!-- Divider -->
              <hr class="sidebar-divider my-0">

              <!-- Nav Item - Dashboard -->
              <li class="nav-item active">
                  <a class="nav-link" href="/chart">
                      <i class="fas fa-fw fa-chart-bar"></i>
                      <span>Data Chart</span></a>
              </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkun"
                    aria-expanded="true" aria-controls="collapseAkun">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Manajemen Akun</span>
                </a>
                <div id="collapseAkun" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola data:</h6>
                        <a class="collapse-item" href="/tambahakun">Tambah Akun</a>
                        <a class="collapse-item" href="/dataakun">Data Akun</a>
                    </div>
                </div>
            </li>


            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Barang
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Jenis barang</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola data:</h6>
                        <a class="collapse-item" href="/tambahjenisbarang">Tambah Jenis barang</a>
                        <a class="collapse-item" href="/datajenisbarang">Data Jenis barang</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-save"></i>
                    <span>Data barang</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola data:</h6>
                        <a class="collapse-item" href="/tambahdatabarang">Tambah Data barang</a>
                        <a class="collapse-item" href="/databarang">Data barang</a>
                    </div>
                </div>
            </li>

             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Kerusakan Barang</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola data:</h6>
                        <a class="collapse-item" href="/barangrusak">Lapor barang rusak</a>
                        <a class="collapse-item" href="/databarangrusak">Data barang rusak</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Peminjaman Barang
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Peminjaman Barang</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola data:</h6>
                        <a class="collapse-item" href="/peminjamanbarang">Peminjaman barang</a>
                        <a class="collapse-item" href="/datapeminjaman">Data Peminjaman barang</a>
                        <a class="collapse-item" href="/pengembalianbarang">Pengembalian barang</a>
                    </div>
                </div>
            </li>

           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#pup" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name; }}</span>
                                <i class="fas fa-fw fa-user-alt"></i>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
 
 
                    @yield('content')
 
 
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    

 <!-- Bootstrap core JavaScript-->
 <script src="{!! asset('vendor/jquery/jquery.min.js') !!}" ></script>
 <script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{!! asset('vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.2/chart.js" type="text/javascript"></script>
  

 <!-- Custom scripts for all pages-->
 <script src="{!! asset('js/dash/sb-admin-2.min.js') !!}"></script>

 <!-- Page level plugins -->
 <script src="{!! asset('vendor/chart.js/Chart.min.js') !!}"></script>

 <!-- Page level custom scripts -->
 <script src="{!! asset('js/dash/demo/chart-area-demo.js') !!}"></script>
 
 <script src="{!! asset('js/dash/demo/chart-bar-demo.js') !!}"></script>
 @yield('bar')
 
 @yield('bar1')

 @yield('bar2')
 
 <!-- Page level plugins -->
 <script src="{!! asset('vendor/datatables/jquery.dataTables.min.js') !!}"></script>
 <script src="{!! asset('vendor/datatables/dataTables.bootstrap4.min.js') !!}"></script>
  <!-- Page level custom scripts -->
  <script src="{!! asset('js/dash/demo/datatables-demo.js') !!}"></script>


</body>

</html>