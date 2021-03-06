<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    	$usuarios = User::All();
        return view('User.index', compact('usuarios'));
    }

    public function consulta(Request $request){
    	$rut = $request->input('rut');
        if(\Auth::check()) {
            $idUsuario=Auth::user()->id;
        }
        $usuarioActual=DB::table('users')->find($idUsuario);
        $usuario=DB::table('users')->where('rut', $rut)->get();
        return view('User.consulta', compact('usuarioActual', 'usuario'));
    }

    public function inscripcion(Request $request){
    	
    	return view('User.inscripcion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    	//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $idTipo=Auth::user()->user_type;
        if($idTipo == 1 or $idTipo == 2){
            User::create([
            	'name' => $request['nombres'],
            	'email' => $request['email'],
            	'password' => bcrypt($request['password']),
            	'rut' => $request['rut'],
                'telefono' => $request['telefono'],
                'metodo_pago' => $request['metodo_pago'],
            	]);
            return redirect('/home')->with('message', 'store');
        }
        return redirect('/home')->with('message','error_permisos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    	$usuario=User::find($id);
        return view('User.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
    	$idTipo=Auth::user()->user_type;
        if($idTipo == 1){
	        $usuario = User::find($id);
	        $usuario->name = $request->name;
	        $usuario->email = $request->email;
	        $usuario->user_type = $request->user_type;
	        $usuario->activo = $request->membresia;
	        $usuario->telefono = $request->telefono;
	        $usuario->metodo_pago = $request->metodo_pago;
	        $usuario->save();
	        return redirect('/usuarios')->with('message','update');
	    }
	    return redirect('/home')->with('message','error_permisos');
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
    		User::destroy($id);
    		return redirect('/usuarios')->with('message','delete');
    	}
    	return redirect('/home')->with('message','error_permisos');
    }
}