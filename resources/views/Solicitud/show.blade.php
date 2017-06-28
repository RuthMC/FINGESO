@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1>Solicitud {{ $solicitud->id }}</h1>
    <ul>
      <li>Titulo: {{ $solicitud->Titulo }}</li>
      <li>Texto: {{ $solicitud->Texto }}</li>
      <li>Fecha emisión: {{ $solicitud->Fecha_emision }}</li>
    </ul>
  </div>
</div>

@endsection