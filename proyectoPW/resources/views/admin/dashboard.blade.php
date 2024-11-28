@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Panel de Administración</h1>

    <!-- Usuarios -->
    <div class="my-4">
        <h2>Usuarios</h2>
        <a href="{{ route('admin.createUser') }}" class="btn btn-primary mb-3">Crear Usuario</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->usuario }}</td>
                        <td>{{ $usuario->rol }}</td>
                        <td>
                            <a href="{{ route('admin.editUser', $usuario->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('admin.deleteUser', $usuario->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Vuelos -->
    <div class="my-4">
        <h2>Vuelos</h2>
        <a href="{{ route('admin.createVuelo') }}" class="btn btn-primary mb-3">Crear Vuelo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vuelos as $vuelo)
                    <tr>
                        <td>{{ $vuelo->id }}</td>
                        <td>{{ $vuelo->origen }}</td>
                        <td>{{ $vuelo->destino }}</td>
                        <td>{{ $vuelo->fecha_salida }}</td>
                        <td>{{ $vuelo->precio }}</td>
                        <td>
                            <a href="{{ route('admin.editVuelo', $vuelo->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('admin.deleteVuelo', $vuelo->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Hoteles -->
    <div class="my-4">
        <h2>Hoteles</h2>
        <a href="{{ route('admin.createHotel') }}" class="btn btn-primary mb-3">Crear Hotel</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hoteles as $hotel)
                    <tr>
                        <td>{{ $hotel->id }}</td>
                        <td>{{ $hotel->nombre }}</td>
                        <td>{{ $hotel->ciudad }}</td>
                        <td>{{ $hotel->precio_por_noche }}</td>
                        <td>
                            <a href="{{ route('admin.editHotel', $hotel->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('admin.deleteHotel', $hotel->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
