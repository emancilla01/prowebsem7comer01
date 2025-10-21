@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@section('contenido2')
<h2>Detalle del Departamento</h2>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $departamento->nombre }}</h5>
        <p class="card-text"><strong>Nombre corto:</strong> {{ $departamento->nombre_corto }}</p>
        <p class="card-text"><strong>Teléfono:</strong> {{ $departamento->telefono }}</p>
    </div>
</div>
<a href="{{ route('departamentos.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection