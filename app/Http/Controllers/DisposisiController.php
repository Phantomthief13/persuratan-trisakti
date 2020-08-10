<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\disposisi;
use App\pegawai;

class DisposisiController extends Controller
{
    public function index()
    {
            $disposisi = DB::table('disposisi')
             ->where(DB::raw('ditujukan'), Session::get('jabatan'))
             ->orwhere(DB::raw('Penerima'), Session::get('jabatan'))
             ->get();

            return view('/Disposisi/disposisi', compact('disposisi'));
    }

    public function tambah($id)
    {
        $disposisi = disposisi::find($id);
        $pegawai = pegawai::all();
        return view('/Disposisi/form_tambah', compact('disposisi', 'pegawai'));
    }

    public function store(Request $request, $id)
    {
        $disposisi = disposisi::find($id);

        // $this->validate($request, [
        //     'penerima' => 'required',
        //     'isi' => 'required',
        //     'status' => 'required'
        // ]);

        $disposisi->penerima = $request->penerima;
        $disposisi->isi = $request->isi;
        // $disposisi->status = $request->status;

        $disposisi->save();

        return redirect('/disposisi');
    }

    public function delete($id)
    {
        $disposisi = disposisi::find($id);
        $disposisi->delete();

        return redirect('/disposisi');
    }

    public function download($id)
    {
        $disposisi = disposisi::find($id);
        return Storage::download($disposisi->lampiran, $disposisi->title);
    }

    public function edit($id)
    {
        $disposisi = disposisi::find($id);
        $pegawai = pegawai::all();
        return view('/Disposisi/form_edit', compact('disposisi', 'pegawai'));
    }

    public function update($id, Request $request)
    {
        $disposisi = disposisi::find($id);

        $disposisi->Penerima = $request->penerima;
        $disposisi->isi = $request->isi;
        $disposisi->status = $request->status;

        $disposisi->save();

        return redirect('/disposisi');
    }

    public function detail($id)
    {
        $disposisi = disposisi::find($id);
        return view('/Disposisi/detail', compact('disposisi'));
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $disposisi = disposisi::all()
            ->where('nomor', $cari);
        return view('/Disposisi/disposisi', compact('cari', 'disposisi'));
    }
}
