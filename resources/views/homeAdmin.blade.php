<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu Admin</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{ route('DataPengguna') }}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Data Pengguna</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sepatu') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Data Barang</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
                    
                        
            <div class="col py-3">
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
                                @can('admin')
                                <a class="nav-link active" aria-current="page" href="{{ route('homeAdmin.index') }}">Admin</a>
                                @endcan
                            </div>
                        </div>
                        <div class="text-end d-flex align-items-center">
                            <div class="user me-3">
                                Halo, {{ Auth::user()->name }}
                            </div>
                            <div class="logout">
                                <a href="{{ route('login.logout') }}" class="btn btn-danger">Logout</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
                <h3>Ini adalah halaman Admin</h3>
                <p>Silahkan pilih menu data di samping</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>