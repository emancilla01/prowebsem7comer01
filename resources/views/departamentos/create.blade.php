@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@section('contenido2')
<h2>Nuevo Departamento</h2>

<form action="{{ route('departamentos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="nombre_corto" class="form-label">Nombre Corto</label>
        <input type="text" class="form-control" id="nombre_corto" name="nombre_corto">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 