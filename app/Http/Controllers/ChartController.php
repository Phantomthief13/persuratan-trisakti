<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\disposisi;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {

        $selesai = DB::table('disposisi')
             ->addSelect(DB::raw('COUNT("*") as Total'))
             ->where(DB::raw('status'), 'Selesai')
             ->where(DB::raw('Penerima'), Session::get('jabatan'))
             ->get();
             
        $belum = DB::table('disposisi')
             ->addSelect(DB::raw('COUNT("*") as Belum'))
             ->where(DB::raw('status'), 'Belum')
             ->where(DB::raw('Penerima'), Session::get('jabatan'))
             ->get();
             
        $categories = ['Belum Selesai', 'Selesai'];
        $laporan1 = [];
        $laporan2 = [];  

        foreach($belum as $b)
        {
            $laporan1[0] =  $b->Belum;
        }
    
        foreach($selesai as $s)
        {
            $laporan2[0] = $s->Total;  
        }
        $Summary = $laporan1[0] + $laporan2[0];
        
        if($laporan2[0] != 0)
            $persentase = $laporan2[0] / $Summary * 100;
        else
            $persentase = 0;
       
        // dd($persentase);  
        return view('/chart/chart', compact('selesai', 'belum', 'categories','laporan1', 'laporan2', 'Summary', 'persentase'));
    }
}
