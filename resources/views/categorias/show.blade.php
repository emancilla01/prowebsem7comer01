@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@section('contenido2')
<h2>Detalle de Categoría</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $categoria->nombre }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $categoria->descripcion }}</p>
        </div>
    </div>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>

@endsection