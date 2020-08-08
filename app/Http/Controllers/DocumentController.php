<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKeluar;

class DocumentController extends Controller
{
    public function create($id)
    {
        $keluar = SuratKeluar::find($id);

        $phpword = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpword->addSection();
        $text = $section->addText($keluar->nomor);
        $text = $section->addText($keluar->ditujukan);
        $text = $section->addText($keluar->tanggal);
        $text = $section->addText($keluar->perihal);
        $text = $section->addText($keluar->isi);
        $text = $section->addText($keluar->asal,array('name'=>'BookmanOldStyle', 'size'=> 12));

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, 'Word2007');
        $objWriter->save('SuratKeluar.docx');
        return response()->download(public_path('SuratKeluar.docx'));
    }
}
