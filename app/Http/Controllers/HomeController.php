<?php

namespace SisInventario\Http\Controllers;

use Illuminate\Http\Request;


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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home');
    }

    public function infoayuda()
    {
        return view('infoayuda');
    }

    public function plaqueta()
    {
        return view('pdf.plaquetaprueba');
    }
}
