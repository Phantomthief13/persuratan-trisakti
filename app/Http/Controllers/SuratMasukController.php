<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\SuratMasuk;
use App\pegawai;
use App\disposisi;

class SuratMasukController extends Controller
{
    public function index()
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{ 

        // $surat = SuratMasuk::find(Session::get('jabatan'));
        $surat = SuratMasuk::all();

        return view('/surat_masuk/surat_masuk', compact('surat'));
        }
    }

    public function create()
    {
        $pegawai = pegawai::all();
        return view('/surat_masuk/form_tambah', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nomor' => 'required',
            'asal' => 'required',
            'tanggal' => 'required',
            'ditujukan' => 'required',
            'perihal' => 'required',
            // 'lampiran' => 'required'
        ]);

        $nomor = $request->nomor;
        $asal = $request->asal;
        $tanggal = $request->tanggal;
        $ditujukan = $request->ditujukan;
        $perihal = $request->perihal;
        $file = $request->file('file');

        $extension = $file->extension();
        $nama = date('myHis').".".$extension;
        $path = Storage::putFileAs('/public/upload', $file, $nama);

        $dataSurat = [
            'nomor' => $nomor,
            'asal' => $asal,
            'tanggal' => $tanggal,
            'ditujukan' => $ditujukan,
            'perihal' => $perihal,
            'lampiran' => $path
        ];

        $storeSurat = SuratMasuk::create($dataSurat);

        
        $storeSurat->save();


        return redirect('surat_masuk');
    }

    public function kirim($id){

        $surat = SuratMasuk::find($id);

        $dataDisposisi = [
            'nomor' => $surat->nomor,
            'asal' => $surat->asal,
            'tanggal' => $surat->tanggal,
            'ditujukan' => $surat->ditujukan,
            'perihal' => $surat->perihal,
            'lampiran' => $surat->lampiran,
        ];

        $surat->status = "TRUE";
        
        $storeDisposisi = disposisi::create($dataDisposisi);
        $storeDisposisi->save();
        $surat->save();

        return redirect('surat_masuk');
        
    }

    public function edit($id)
    {
        $surat = SuratMasuk::find($id);
        return view('surat_masuk.form_edit', compact('surat'));
    }

    public function update($id, Request $request)
    {
        $surat = SuratMasuk::find($id);

        $surat->nomor = $request->nomor;
        $surat->asal = $request->asal;
        $surat->tanggal = $request->tanggal;
        $surat->ditujukan = $request->ditujukan;
        $surat->perihal = $request->perihal;
        $surat->lampiran = $request->lampiran;

        $surat->save();

        return redirect('surat_masuk');
    }

    public function delete($id)
    {
        $surat = SuratMasuk::find($id);
        $surat->delete();
        return redirect('surat_masuk');
    }

    public function detail($id)
    {
        $surat = SuratMasuk::find($id);
        return view('/surat_masuk/detail', compact('surat'));
    }
    public function download($id)
    {
        $surat = SuratMasuk::find($id);
        return Storage::download($surat->lampiran, $surat->title);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $surat = SuratMasuk::all()
            ->where('nomor', $cari);
        return view('/surat_masuk/surat_masuk', compact('cari', 'surat'));
    }
}
