@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@section('contenido2')

<h2>Detalles del Cliente</h2>
<ul>
    <li><strong>Nombre:</strong> {{ $cliente->nombre }}</li>
    <li><strong>Fecha de Nacimiento:</strong> {{ $cliente->fecha_nac }}</li>
    <li><strong>RFC:</strong> {{ $cliente->rfc }}</li>
    <li><strong>Edad:</strong> {{ $cliente->edad }}</li>
</ul>
<a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver a la lista</a>
@endsection