<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pengguna</title>
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
                    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" aria-current="page" href="{{ route('home.index') }}">Home</a>
                            <a class="nav-link active" href="{{ route('homeAdmin.index') }}">Admin</a>
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
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-10">
                        <h1>Tabel Data Pengguna</h1>
                        <a href="{{ route('dataPengguna.create') }}" class="btn btn-success">Tambah Data</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n= 1;
                                @endphp
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $n }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ($user->is_admin)== 1 ? "Admin" : "User" }}</td>
                                    <td>
                                        <a href="{{ route('dataPengguna.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('dataPengguna.destroy',$user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="confirm('Anda yakin akan meenghapus data ini?')">Hapus</button>
                                    </form> 
                                    </td>
                                </tr>
                                @php
                                    $n++;
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
