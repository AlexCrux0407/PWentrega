@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Editar Usuario</h1>
    <form action="{{ route('admin.updateUser', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" required>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $usuario->usuario }}" required>
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" id="rol" name="rol" required>
                <option value="usuario" {{ $usuario->rol == 'usuario' ? 'selected' : '' }}>Usuario</option>
                <option value="administrador" {{ $usuario->rol == 'administrador' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
