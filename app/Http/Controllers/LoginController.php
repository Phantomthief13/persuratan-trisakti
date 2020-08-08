<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\pegawai;

class LoginController extends Controller
{
    public function index()
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{   
            return view('/Dashboard');
        }
    }

    public function main(){
        
        return view('/autentikasi/login');
    }

    public function auth(Request $request)
    {
        $nip = $request->nip;
        $password = $request->password; 

        $data = pegawai::where('NIP', $nip)->first();
        
        if($data)
        {
            if(hash::check($password, $data->password))
            {
                Session::put('NIP', $data->nip);
                Session::put('nama', $data->nama);
                Session::put('jabatan', $data->jabatan);
                Session::put('privilege', $data->privilege);
                Session::put('login', TRUE);
                return redirect('/main');
            }
            else
            {
                return redirect('/')->with('alert', 'Password atau Username salah');
            }
        }
        else
        {
            return redirect('/')->with('alert', 'Password atau Username salah');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('alert', 'Kamu Sudah Logout');
    }
}
