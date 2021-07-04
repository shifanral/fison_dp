<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tabel').DataTable();
            } );
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        <script src="https://kit.fontawesome.com/b9080c8a73.js" crossorigin="anonymous"></script>
        <link href="{{ asset('style/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('/style/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <title>
            @yield('title')
        </title>
    </head>
    <body style="background-color: #0288d1;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:#ffe6d0 !important ; opacity:80%;">
            <div class="container">
                <a class="navbar-brand" href="{{ route('guest.index') }}"><img alt="FISON DIGITAL PRINTING" src="{{ asset('image/logo.png') }}" width="100px" height="100px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('guest.index') }}" style="color: black;">Beranda
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#produk" style="color: black;">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq" style="color: black;">FAQ</a>
                        </li>

                        @if (Route::has('login'))
                            @auth
                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                        <i class="fas fa-user"></i>
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profil
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Ubah Password
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Keluar
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    </div>
                                </li>
                            @else
                            <li class="nav-item">
                                <button type="button" name="commit" class="btn" data-toggle="modal" data-target="#login" style="border-width: medium; border-color: blue; !important; color: black; background-color: white; !important;">Login</button>
                            </li>
                            @endauth
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /Navbar -->

        <div class="mt-5 pt-3">
            @yield('content')
        </div>
        <!-- Form Login -->
        <div class="modal fade" id="login" role="dialog">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <img class="rounded mb-5 mx-auto d-block" src="{{ asset('image/logo.png') }}" width="100px" height="100px">

                        <!-- ACTIONNYA MENGARAH PADA URL /LOGIN -->
                        <!-- UNTUK MENCARI TAU TUJUAN URI DARI ROUTE NAME DIBAWAH, PADA COMMAND LINE, KETIKKAN PHP ARTISAN ROUTE:LIST DAN CARI URI YANG MENGGUNAKAN METHOD POST -->
                        <!-- KARENA URI /LOGIN DENGAN METHOD GET DIGUNAKAN UNTUK ME-LOAD VIEW HALAMAN LOGIN -->
                        <!-- PENGGUNAAN ROUTE() APABILA ROUTING TERSEBUT MEMILIKI NAMA, ADAPUN NAMENYA ADA PADA COLOM NAME ROUTE:LIST -->
                        <!-- JIKA ROUTINGNYA TIDAK MEMILIKI NAMA, MAKA GUNAKAN HELPER URL() DAN DIDALAMNYA ADALAH URINYA. CONTOH URL('/LOGIN') -->
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                
                                <!-- $errors->has('email') AKAN MENGECEK JIKA ADA ERROR DARI HASIL VALIDASI LARAVEL, SEMUA KEGAGALAN VALIDASI LARAVEL AKAN DISIMPAN KEDALAM VARIABLE $errors -->
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    type="email" 
                                    name="email"
                                    placeholder="Email Address" 
                                    value="{{ old('email') }}" 
                                    autofocus 
                                    required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    type="password" 
                                    name="password"
                                    placeholder="Password" 
                                    required>
                            </div>
                            <div class="row">
                                @if (session('error'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary px-4">Login</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- /Form Login -->
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('style/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('style/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('style/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('style/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('style/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('style/js/demo/chart-pie-demo.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tabel').DataTable();
            } );
        </script>
        <script>
            function hanyaAngka(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))            
                    return false;
                return true;
            }
        </script>
    </body>
</html>