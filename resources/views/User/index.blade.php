@extends('layouts.app')

<?php $message=Session::get('message')?>

@if($message == 'update')
<div class="alert alert-success">
  <strong>¡Usuario editado!</strong> La edición ha sido exitosa.
</div>

@elseif($message == 'delete')
<div class="alert alert-danger">
  <strong>¡Usuario eliminado!</strong> Se ha eliminado correctamente al usuario.
</div>
@endif

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
            <table class="table">
            	<thead>
            		<th>Nombre</th>
            		<th>Rut</th>
            		<th>Correo</th>
                    <th>Tipo de usuario</th>
            		<th>Membresía</th>
                    <th>Método pago</th>
                    <th>Acciones</th>
            	</thead>
            	@foreach ($usuarios as $user)
            	<tbody>
            		<td>{{ $user->name }}</td>
            		<td>{{ $user->rut }}</td>
            		<td>{{ $user->email }}</td>
                    <td>
                    @if ($user->user_type === 1)
                        Administrador
                    @elseif ($user->user_type === 2)
                        Ejecutivo
                    @elseif ($user->user_type === 3)
                        Empresa
                    @elseif ($user->user_type === 0)
                        Socio
                    @endif
                    </td>
                    <td>
                    @if ($user->activo === 1)
                        Activa
                    @else
                        Inactiva
                    @endif
                    </td>
                    <td>
                    @if ($user->metodo_pago === 0)
                        Efectivo
                    @elseif ($user->metodo_pago === 1)
                        Cheque
                    @elseif ($user->metodo_pago === 2)
                        Tarjeta crédito
                    @elseif ($user->metodo_pago === 3)
                        PAC
                    @elseif ($user->metodo_pago === 3)
                        Tranferencia electrónica
                    @elseif ($user->metodo_pago === 3)
                        Planilla USACH
                    @endif
                    </td>
            		<td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Editar</a></td>
            	</tbody>
            	@endforeach
            </table>
            </div>
            <a href="/home" class="btn btn-default">Atras</a>
        </div>
    </div>
</div>
@endsection