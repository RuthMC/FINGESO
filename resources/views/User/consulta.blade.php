@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Bienvenido {{ $usuarioActual->name }}</div>
            <div class="text-center">
            <h1>Consultar membresía</h1>
            <label for="usr">RUT:</label>
            <form action="" method="GET">
            <input type="text" name="rut" placeholder="123456789" required/>
            <br>
            <small>Recuerde ingresar el rut sin puntos ni guion.</small>
            <br>    
            <button type="submit" class="btn btn-primary">Verificar</button>
            </form>
            @if(count($usuario) === 1)
                @foreach ($usuario as $object)
                @if ($object->activo === 1)
                    <li>El rut {{ $object->rut }} está <ins><strong>activo</strong></ins>.</li>
                @else
                    <li>El rut {{ $object->rut }} está <ins><strong>inactivo</strong></ins></li>
                @endif
                @endforeach
            @else
                <li>No existe el rut</li>
            @endif
            <a href="/home" class="btn btn-default">Atras</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection