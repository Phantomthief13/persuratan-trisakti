<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKeluar;
use App\pegawai;
use App\verifikasi;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $keluar = SuratKeluar::all();
        $verifikasi = verifikasi::all();
        return view('surat_keluar.surat_keluar', compact('keluar', 'verifikasi'));
    }

    public function create()
    {
        $pegawai = pegawai::all();
        return view('/surat_keluar/form_tambah', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor' => 'required',
            'ditujukan' => 'required',
            'tanggal' => 'required',
            'perihal' => 'required',
            'asal' => 'required',
            'isi' => 'required'
        ]);

        $nomor = $request->nomor;
        $ditujukan = $request->ditujukan;
        $tanggal = $request->tanggal;
        $perihal = $request->perihal;
        $pemeriksa = $request->pemeriksa;
        $asal = $request->asal;
        $isi = $request->isi;

        $dataSurat=[
            'nomor' => $nomor,
            'ditujukan' => $ditujukan,
            'tanggal' => $tanggal,
            'perihal' => $perihal,
            'pemeriksa' => $pemeriksa,
            'asal' => $asal,
            'isi' => $isi
        ];

        $storeSurat = SuratKeluar::create($dataSurat);
        $storeSurat->save();

        return redirect('/surat_keluar');
    }

    public function edit($id)
    {
        $keluar = SuratKeluar::find($id);
        $verifikasi = verifikasi::where('nomor', $keluar->nomor)->first();
        return view('/surat_keluar/form_edit', compact('keluar', 'verifikasi'));
    }

    public function update($id, Request $request)
    {
        $keluar = SuratKeluar::find($id);

        if($keluar->status == 'Tolak')
        {
            $verifikasi = verifikasi::where('nomor', $keluar->nomor)->first();

            $keluar->nomor = $request->nomor;
            $keluar->ditujukan = $request->ditujukan;
            $keluar->tanggal = $request->tanggal;
            $keluar->perihal = $request->perihal;
            $keluar->asal = $request->asal;
            $keluar->isi = $request->isi;
            $keluar->status = '';
            
            $verifikasi->nomor = $request->nomor;
            $verifikasi->ditujukan = $request->ditujukan;
            $verifikasi->tanggal = $request->tanggal;
            $verifikasi->perihal = $request->perihal;
            $verifikasi->asal = $request->asal;
            $verifikasi->isi = $request->isi;
            $verifikasi->status = '';

            $keluar->save();
            $verifikasi->save();

            return redirect('/surat_keluar');
        }
        else
        {
            $keluar->nomor = $request->nomor;
            $keluar->ditujukan = $request->ditujukan;
            $keluar->tanggal = $request->tanggal;
            $keluar->perihal = $request->perihal;
            $keluar->asal = $request->asal;
            $keluar->isi = $request->isi;

            $keluar->save();

            return redirect('surat_keluar');
        }
    }

    public function detail($id)
    {
        $keluar = SuratKeluar::find($id);
        // membaca data dari form
        $nomor = $keluar->nomor;
        $tanggal = $keluar->tanggal;
        $perihal = $keluar->perihal;
        $ditujukan = $keluar->ditujukan;
        $asal = $keluar->asal;
        $isi = $keluar->isi;
        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents("surat.rtf");
        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NOMOR", $nomor, $document);
        $document = str_replace("#TANGGAL", $tanggal, $document);
        $document = str_replace("#PERIHAL", $perihal, $document);
        $document = str_replace("#DITUJUKAN", $ditujukan, $document);
        $document = str_replace("#ASAL", $asal, $document);
        $document = str_replace("#ISI", $isi, $document);
        // header untuk membuka file output RTF dengan MS. Word
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=suratIjin.doc");
        header("Content-length: ".strlen($document));
        echo $document;
        return redirect('/surat_keluar/detail', compact('keluar'));
    }

    public function delete($id)
    {
        $keluar = SuratKeluar::find($id);
        $keluar->delete();
        return redirect('/surat_keluar');
    }

    public function send($id)
    {
        $keluar = SuratKeluar::find($id);

        $dataSurat=[
            'nomor' => $keluar->nomor,
            'ditujukan' => $keluar->ditujukan,
            'tanggal' => $keluar->tanggal,
            'perihal' => $keluar->perihal,
            'pemeriksa' => $keluar->pemeriksa,
            'asal' => $keluar->asal,
            'isi' => $keluar->isi
        ];

        $storeVerif = verifikasi::create($dataSurat);
        $storeVerif->save();

        return redirect('/surat_keluar');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $keluar = SuratKeluar::all()
            ->where('nomor', $cari);
        return view('/surat_keluar/surat_keluar', compact('cari', 'keluar'));
    }
}
