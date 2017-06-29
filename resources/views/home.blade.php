@extends('layouts.app')

<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success">
  <strong>¡Usuario Creado!</strong> La inscripción ha sido satisfactoria.
</div>
@elseif($message == 'error_permisos')
<div class="alert alert-danger">
  <strong>¡Permiso denegado!</strong> No tienes acceso a tal acción.
</div>
@endif

@section('content')

@if ($usuarioActual->user_type === 3)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Bienvenido {{ $usuarioActual->name }}</div>
            </div>
            <a href="{{ url('/consulta') }}" class="btn btn-primary">Consultar membresía</a>
        </div>
    </div>
</div>
@elseif ($usuarioActual->user_type === 2)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Bienvenido {{ $usuarioActual->name }}</div>
                </div>
                <a href="{{ url('/consulta') }}" class="btn btn-primary">Consultar membresía</a>
                <a href="{{ url('/inscripcion') }}" class="btn btn-success">Inscribir socio</a>
            </div>
        </div>
    </div>

@elseif ($usuarioActual->user_type === 1)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Bienvenido {{ $usuarioActual->name }}</div>
                </div>
                <a href="{{ url('/consulta') }}" class="btn btn-primary">Consultar membresía</a>
                <a href="{{ url('/inscripcion') }}" class="btn btn-success">Inscribir socio</a>
                <a href="{{ url('/solicitudes') }}" class="btn btn-primary">Ver solicitudes</a>
                <a href="{{ url('/usuarios') }}" class="btn btn-success">Ver usuarios del sistema</a>
            </div>
        </div>
    </div>
@elseif ($usuarioActual->user_type === 0)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Bienvenido {{ $usuarioActual->name }}</div>
                </div>
                <a href="{{ url('/solicitar') }}" class="btn btn-success">Añadir solicitud</a><br>
            </div>
        </div>
    </div>
@endif
@endsection
