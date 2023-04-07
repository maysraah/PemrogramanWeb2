<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataPenggunaController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();

        return view('dataPengguna',$data);
    }

    public function create()
    {
        return view('tambahPengguna');
    }

    public function store(Request $request)
    {
        $namaInput = $request->input('namaInput');
        $emailInput = $request->input('emailInput');
        $passwordInput = $request->input('passwordInput');
        $is_adminInput = $request->input('is_adminInput');

        // dd($request->input(''));

        $query = DB::table('users')->insert([
            'name' => $namaInput,
            'email' => $emailInput,
            'password' => Hash::make($passwordInput),
            'is_admin' => $is_adminInput
        ]);

        if ($query) {
            return redirect()->route('DataPengguna')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('DataPengguna')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    public function show($id)
    {
        $data['users'] = DB::table('users')->where('id', $id)->first();

        return view('editPengguna', $data);
    }

    public function edit($id)
    {
        $data['users'] = DB::table('users')->where('id', $id)->first();

        return view('editPengguna', $data);
    }

    public function update(Request $request, $id)
    {
        $namaInput = $request->input('namaInput');
        $emailInput = $request->input('emailInput');
        $passwordInput = $request->input('passwordInput');
        $is_adminInput = $request->input('is_adminInput');

        $query = DB::table('users')->where('id', $id)->update([
            'name' => $namaInput,
            'email' => $emailInput,
            'password' => Hash::make($passwordInput),
            'is_admin' => $is_adminInput
        ]);

        if ($query) {
            return redirect()->route('DataPengguna')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('DataPengguna')->with('failed', 'Data Gagal Diupdate');
        }

    }

    public function destroy($id)
    {
        $query = DB::table('users')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('DataPengguna')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('DataPengguna')->with('failed', 'Data Gagal Dihapus');
        }
    }
}
