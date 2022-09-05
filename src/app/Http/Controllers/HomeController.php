<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $response = Http::withToken('Bearer KM4GEyP5leSIQdVaCNhy5paf5Sp7WDmz')
        // // ->get('http://89.22.229.228:5080/rest/v2/request?_path=LiveApp/rest/v2/broadcasts/count')
        // ->get('http://89.22.229.228:5080/rest/v2/broadcasts/count')
        // ->body();
        return view('home');
    }
}
