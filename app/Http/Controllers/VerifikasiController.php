<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\verifikasi;
use App\SuratKeluar;

class VerifikasiController extends Controller
{
    public function index()
    {
        $verifikasi = verifikasi::all()
            ->where('pemeriksa', Session::get('jabatan'));

        return view('/Verifikasi/Verifikasi', compact('verifikasi'));
    }

    public function verif($id)
    {
        $verifikasi = verifikasi::find($id);
        return view('/Verifikasi/form_tambah', compact('verifikasi'));
    }

    public function store($id, Request $request)
    {
        $verifikasi = verifikasi::find($id);

        $this->validate =[
            'status' => 'required',
            'catatan' => 'required'
        ];
        
        $keluar = SuratKeluar::where('nomor', $verifikasi->nomor)->first();
        
        $keluar->status = $request->status;
        $verifikasi->status = $request->status;
        $verifikasi->catatan = $request->catatan;

        $verifikasi->save();
        $keluar->save();

        return redirect('/verifikasi');
    }

    public function edit($id)
    {
        $verifikasi = verifikasi::find($id);

        return view('/Verifikasi/form_edit', compact('verifikasi'));
    }

    public function update($id, Request $request)
    {
        $verifikasi = verifikasi::find($id);

        $verifikasi->catatan = $request->catatan;
        $verifikasi->status = $request->status;

        $verifikasi->save();

        return redirect('/verifikasi');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $verifikasi = verifikasi::all()
            ->where('nomor', $cari);
        return view('/Verifikasi/Verifikasi', compact('cari', 'verifikasi'));
    }

    public function detail($id)
    {
        $verifikasi = verifikasi::find($id);
        return view('/Verifikasi/detail', compact('verifikasi'));
    }
}
