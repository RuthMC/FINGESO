@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edición del usuario {{ $usuario->name }}</div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('user.update', $usuario->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="user_type" class="col-md-4 control-label">Tipo de usuario:</label>

                            <div class="col-xs-5">
                            <select class="form-control" name="user_type" id="user_type">
                                <option value="{{ $usuario->user_type }}" selected>Seleccione una opción:</option>
                                <option value="0" >Socio</option>
                                <option value="2" >Ejecutivo</option>
                                <option value="3" >Empresa</option>
                                <option value="1" >Administrador</option>
                            </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="membresia" class="col-md-4 control-label">Memebresía:</label>
                            <div class="col-xs-5">
                            <select class="form-control" name="membresia" id="membresia">
                                <option value="{{ $usuario->activo }}" selected>Seleccione una opción:</option>
                                <option value="0" >Inactiva</option>
                                <option value="1" >Activa</option>
                            </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <h3>¿Desea eliminar al usuario {{ $usuario->name }}?</h2>
                    <br>
                    <form class="delete" action="{{ route('user.destroy', $usuario->id) }}" method="POST">
        				<input type="hidden" name="_method" value="DELETE">
        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    	<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Atras</a>
        </div>
    </div>
</div>
@endsection