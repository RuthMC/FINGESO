@extends('layouts.app')

<?php $message=Session::get('message')?>

@if($message == 'delete')
<div class="alert alert-danger">
  <strong>¡Solicitud eliminada!</strong> Se ha eliminado correctamente la solicitud.
</div>
@endif

@section('content')
<div class="container">
  <div class="row">
  	<div class="col-md-8 col-md-offset-2">
	        <h1>Solicitudes</h1>
	        <div class="panel panel-default">
			  	<ul>
			  	@foreach ($solicitudes as $solicitud)
				    <h3>{{ $solicitud->Titulo }}</h1>
				    <ul>
				      	<li>Autor: 
				      	@foreach ($usuarios as $user)
				      		@if($user->id === $solicitud->id_user)
				      			{{ $user->name }}
				      			@break
				      		@endif
				      	@endforeach
				      	</li>
				      	<li>Fecha emisión: {{ $solicitud->created_at }}</li>
				      	<li>Texto: {{ $solicitud->Texto }}</li>
				    </ul>
				    <br>
				    <div class="text-left">
				    <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Responder</a></td>
				    <br><br>
				    <form class="delete" action="{{ route('solicitud.destroy', $solicitud->id) }}" method="POST">
        				<input type="hidden" name="_method" value="DELETE">
        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    	<div class="form-group">
                            <div class="text-left">
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </form>
				    </div>
				    <hr />
			    @endforeach
			    </ul>
			</div>
			<a href="/home" class="btn btn-default">Atras</a>
		</div>
  </div>
</div>
@endsection