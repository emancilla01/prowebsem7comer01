@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@section('contenido2')
<h2>Nuevo Empleado</h2>

<form action="{{ route('empleados.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="RFC" class="form-label">RFC</label>
        <input type="text" class="form-control" id="RFC" name="RFC" maxlength="13" required>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" maxlength="100" required>
    </div>
    <div class="mb-3">
        <label for="apellido_pat" class="form-label">Apellido Paterno</label>
        <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" maxlength="100">
    </div>
    <div class="mb-3">
        <label for="apellido_mat" class="form-label">Apellido Materno</label>
        <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" maxlength="100">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 