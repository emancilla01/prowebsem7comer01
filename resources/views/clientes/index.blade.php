@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('contenido2')
<p>INFORMACION DE CLIENTES</p>
<div class="table-responsive">
    <table class="table table-primary">
        <a href="{{ route('clientes.create') }}">Crear nuevo cliente</a>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha Nac</th>
                <th scope="col">RFC</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr class="">
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->fecha_nac}}</td>
                <td>{{$cliente->rfc}}</td>
                <td><a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a></td>
                <td><a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info btn-sm">Ver</a></td>
                <td>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <p>
        {{$clientes->links()}}
    </p>
</div>



<!-- {{-- <h1>Lista de Clientes</h1>
    <hr>
    <ul>
        @foreach ($clientes as $cliente)             
        <li>{{$cliente->id}} {{$cliente->nombre}}</li>
        @endforeach
    </ul>
    {{$clientes->links()}} --}} -->
    
@endsection 