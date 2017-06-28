<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

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
        $rut = $request->input('rut');
        if(\Auth::check()) {
            $idUsuario=Auth::user()->id;
        }
        $usuarioActual=DB::table('users')->find($idUsuario);
        return view('home', compact('usuarioActual'));
    }
}
