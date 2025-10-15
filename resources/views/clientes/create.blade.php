@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@section('contenido2')
<form action="{{ route('clientes.store') }}" method="POST" class="p-4">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="fecha_nac" class="form-label">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" required>
    </div>
    <div class="mb-3">
    <label for="edad" class="form-label">Edad:</label>
    <input type="number" name="edad" id="edad" class="form-control" required>
</div>
    <div class="mb-3">
        <label for="rfc" class="form-label">RFC:</label>
        <input type="text" name="rfc" id="rfc" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection