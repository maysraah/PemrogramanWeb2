@extends('layouts.main')

@section('container')
<h3 class="text-center">Tambah Data Sepatu</h3>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5 border rounded mt-2">
                <form action="{{ route('sepatu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            
                    <div class="mb-3">
                        <label for="nama_input" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_input" name="namaInput">
                    </div>
                    <div class="mb-3">
                        <label for="harga_input" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga_input" name="hargaInput">
                    </div>
                    <div class="mb-3">
                        <label for="gambar_input" class="form-label">Gambar</label>
                        <input type="file" class="form-control" @error('gambarInput') is-invalid @enderror id="gambar_input" name="gambarInput">
                    @error('gambarInput')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    </div>
                    
                    <div class="row mx-2">
                        <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection