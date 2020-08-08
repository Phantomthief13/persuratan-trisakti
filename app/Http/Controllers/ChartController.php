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

        $results = DB::table('disposisi')
             ->addSelect(DB::raw('COUNT("*") as Total'))
             ->groupBy(DB::raw("status"))
             ->where(DB::raw('Penerima'), Session::get('jabatan'))
             ->get();

        $categories = ['Belum Selesai', 'Selesai'];
        $laporan = [];
        foreach($results as $r)
        {
            $laporan[] = $r->Total;
        }
        
        $Summary = $laporan[0]+$laporan[1];
        
        $persentase = $laporan[1] / $Summary * 100;

        // dd($laporan);
        // dd($results);
        // dd($categories);
        // dd($persentase);
        return view('/chart/chart', compact('results', 'categories','laporan', 'Summary', 'persentase'));
    }
}
