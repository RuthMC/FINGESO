<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Solicitud;
use Auth;
use App\User;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $solicitudes = DB::table('solicituds')->get();
        $usuarios = DB::table('users')->get();
        return view('Solicitud.index', compact('solicitudes', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Solicitud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $idUsuario=Auth::user()->id;
        Solicitud::create([
            'Titulo' => $request['titulo'],
            'Texto' => $request['descripcion'],
            'id_user' => $idUsuario,
            ]);
        return redirect('/home')->with('message', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $solicitud = DB::table('solicituds')->find($id);
        //$solicitud = Solicitud::find($id);
        return view('Solicitud.show', compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $idTipo=Auth::user()->user_type;
        if($idTipo == 1){
            Solicitud::destroy($id);
            return redirect('/solicitudes')->with('message','delete');   
        }
        return redirect('/home')->with('message','error_permisos'); 
    }
}
