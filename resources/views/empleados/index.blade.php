@extends('plantillas.inicio_autenticado')
@section('menu2')
    @include('menu2')
@endsection
@section('contenido2')
<h1>Empleados</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Create button as a GET form so it behaves like a button -->
<form action="{{ route('empleados.create') }}" method="GET" class="d-inline mb-3">
    <button type="submit" class="btn btn-success">Crear Empleado</button>
</form>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Apellido P.</th>
                <th>Apellido M.</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->RFC }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido_pat }}</td>
                <td>{{ $empleado->apellido_mat }}</td>
                <td>{{ $empleado->email }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>
                    <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este empleado?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $empleados->links() }}
    </div>
</div>
@endsection



{{-- post original --}}
{{-- <div class="table-responsive">
    <table class="table table-primary">
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
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>
        {{$clientes->links()}}
    </p>
</div> --}}


{{-- original --}}
<!-- {{-- <h1>Lista de Clientes</h1>
    <hr>
    <ul>
        @foreach ($clientes as $cliente)             
        <li>{{$cliente->id}} {{$cliente->nombre}}</li>
        @endforeach
    </ul>
    {{$clientes->links()}} --}} -->
    
