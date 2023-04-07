<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sepatu;


class SepatuController extends Controller
{
    public function index()
    {
        $data['sepatu'] = DB::table('sepatu')->get();
        return view('sepatu', $data);
    }

    public function create()
    {
        return view('tambahSepatu');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaInput' => 'required|max:255',
            'hargaInput' => 'required',
            'gambarInput' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        if($request->file('gambarInput')){
            $validatedData['gambarInput'] = $request->file('gambarInput')->store('post-images');
        }

        $namaInput = $request->input('namaInput');
        $hargaInput = $request->input('hargaInput');
        $gambarInput = $request->file('gambarInput')->store('post-images');

        // dd($request->input(''));

        $query = DB::table('sepatu')->insert([
            'nama_barang' => $namaInput,
            'harga' => $hargaInput,
            'gambar' => $gambarInput
        ]);

        if ($query) {
            return redirect()->route('sepatu')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('sepatu')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    public function show($id)
    {
        $data['sepatu'] = DB::table('sepatu')->where('id', $id)->first();

        return view('editSepatu', $data);
    }

    public function edit($id)
    {
        $data['sepatu'] = DB::table('sepatu')->where('id', $id)->first();

        return view('editSepatu', $data);
    }

    public function update(Request $request, $id)
    {
        $namaInput = $request->input('namaInput');
        $hargaInput = $request->input('hargaInput');
        $gambarInput = $request->input('gambarInput');

        $query = DB::table('sepatu')->where('id', $id)->update([
            'nama_barang' => $namaInput,
            'harga' => $hargaInput,
            'gambar' => $gambarInput
        ]);

        if ($query) {
            return redirect()->route('sepatu')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('sepatu')->with('failed', 'Data Gagal Diupdate');
        }

    }

    public function destroy($id)
    {
        $query = DB::table('sepatu')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('sepatu')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('sepatu')->with('failed', 'Data Gagal Dihapus');
        }
    }
}
