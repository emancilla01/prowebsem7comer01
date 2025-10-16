@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@section('contenido2')
<h2>Editar Categoría</h2>

<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion', $categoria->descripcion) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection