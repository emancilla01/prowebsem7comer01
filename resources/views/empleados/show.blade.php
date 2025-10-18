@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@section('contenido2')
<h2>Detalle de Empleado</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $empleado->nombre }} {{ $empleado->apellido_pat }} {{ $empleado->apellido_mat }}</h5>
            <p class="card-text"><strong>RFC:</strong> {{ $empleado->RFC }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $empleado->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $empleado->telefono }}</p>
        </div>
    </div>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>

@endsection