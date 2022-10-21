<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['title'] = 'Home';
        if(Auth::user()->role1 == 'Administrator'){
            $data['student'] = DB::table('students')->count();
            $data['donatur'] = DB::table('donaturs')->count();
            return view('utama',$data);
        }elseif (Auth::user()->role1 == 'Donatur') {
            $data['student'] = DB::table('students')->count();
            $data['donatur'] = DB::table('donaturs')->count();
            return view('donatur.homeDonatur',$data);
        }else{
            $data['student'] = DB::table('students')->count();
            return view('mahasiswa.homeMahasiswa',$data);
        }
    }

    
}
