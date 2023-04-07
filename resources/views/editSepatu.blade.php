@extends('layouts.main')

@section('container')
<h3 class="text-center">Edit Data Sepatu</h3>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5 border rounded mt-2">
                <form action="{{ route('sepatu.update', $sepatu->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="nama_input" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_input" name="namaInput" value="{{ $sepatu->nama_barang }}">
                    </div>
                    <div class="mb-3">
                        <label for="harga_input" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga_input" name="hargaInput" value="{{ $sepatu->harga }}">
                    </div>
                    <div class="mb-3">
                        <label for="gambar_input" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar_input" name="gambarInput" value="{{ $sepatu->gambar }}">
                    </div>
                    
                    <div class="row mx-2">
                        <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection