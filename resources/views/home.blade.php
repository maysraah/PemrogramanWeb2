<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
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
                    <a class="nav-link" href="{{ route('homeAdmin.index') }}">Admin</a>
                    @endcan
                </div>
            </div>
            <div class="user me-3">
                Halo, {{ Auth::user()->name }}
            </div>
            <div class="logout">
                <a href="{{ route('login.logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <h1 style="text-align: center">Kumpulan Sepatu Converse<h1>

    <div class="container-fluid mb-5">
        <div class="container-fluid mb-5 pt-5">
                <div class="d-flex flex-nowrap uk-light">
                    {{-- <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
                         --}}
                        @foreach ($sepatu as $item)
                        {{-- <li> --}}
                            <div class="mx-auto uk-panel py-0 pt-2 pb-0 d-flex flex-column justify-content-center align-items-center" style="height:300px;max-width: 300px; border:3px solid white; border-radius:20px; background-color:rgb(233, 233, 233)">
                                <img src="{{ asset('storage/'. $item->gambar) }}" alt="" style="max-height:150px">
                                <h5 style="color:#333" class="text-center">{{ $item->nama_barang }}</h5>
                                <h6 style="color:#333" class="text-center mb-0">{{ $item->harga }}</h6>
                            </div>
                        {{-- </li> --}}
                        @endforeach
                    {{-- </ul> --}}
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
