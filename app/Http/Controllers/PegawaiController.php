<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        // if(Session::get('privilege')=='pegawai')
        // {
        //     $pegawai = pegawai::find(Session::get('jabatan'));
        // }
        $pegawai = pegawai::all();
        return view('/pegawai/pegawai', compact('pegawai'));
    }

    public function create()
    {
        return view('/pegawai/form_tambah');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'nip' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'jabatan' => 'required',
            'privilege' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);

        $NIP = $request->nip;
        $nama = $request->nama;
        $tanggal = $request->tanggal;
        $jabatan = $request->jabatan;
        $privilege = $request->privilege;
        $alamat = $request->alamat;
        $password = $request->password;

        $dataPegawai=[
            'NIP' => $NIP,
            'nama' => $nama,
            'tanggal' => $tanggal,
            'jabatan' => $jabatan,
            'privilege' => $privilege,
            'alamat' => $alamat,
            'password' => bcrypt($password)
        ];

        $storePegawai = pegawai::create($dataPegawai);

        $storePegawai->save();
        
        return redirect('/pegawai');
    }

    public function detail($id)
    {
        $pegawai = pegawai::find($id);
        return view('/pegawai/detail', compact('pegawai'));
    }

    public function edit($id)
    {
        $pegawai = pegawai::find($id);
        return view('/pegawai/form_edit', compact('pegawai'));
    }

    public function update($id, Request $request)
    {
        $pegawai = pegawai::find($id);

        $pegawai->NIP = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->privilege = $request->privilege;
        $pegawai->password = $request->password;

        $pegawai->save();

        return redirect('pegawai');
    }

    public function delete($id)
    {
        $pegawai = pegawai::find($id);
        $pegawai->delete();
        return redirect('/pegawai');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $pegawai = pegawai::all()
            ->where('NIP', $cari);
        return view('/pegawai/pegawai', compact('cari', 'pegawai'));
    }
}

