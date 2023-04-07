@extends('layouts.main')

@section('container')
<h3 class="text-center">Tambah Data Pengguna</h3>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5 border rounded mt-2">
                <form action="{{ route('dataPengguna.store') }}" method="POST">
                    @csrf
            
                    <div class="mb-3">
                        <label for="namaInput" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('namaInput') is-invalid @enderror" id="namaInput" name="namaInput">
                        @error('namaInput')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>                            
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="text" class="form-control @error('emailInput') is-invalid @enderror" id="emailInput" name="emailInput">
                        @error('emailInput')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>                            
                         @enderror
                    </div>

                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Password</label>
                        <input type="password" class="form-control @error('passwordInput') is-invalid @enderror" id="passwordInput" name="passwordInput">
                        @error('passwordInput')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>                            
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="is_adminInput" class="form-label">Is_Admin(0/1)</label>
                        <input type="number" class="form-control" id="is_adminInput" name="is_adminInput">
                    </div>

                    
                    <div class="row mx-2">
                        <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection