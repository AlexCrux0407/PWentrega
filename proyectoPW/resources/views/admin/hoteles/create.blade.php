@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Crear Hotel</h1>
    <form action="{{ route('admin.storeHotel') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" required>
        </div>
        <div class="mb-3">
            <label for="precio_por_noche" class="form-label">Precio por Noche</label>
            <input type="number" class="form-control" id="precio_por_noche" name="precio_por_noche" required>
        </div>
        <div class="mb-3">
            <label for="disponibilidad" class="form-label">Disponibilidad</label>
            <input type="number" class="form-control" id="disponibilidad" name="disponibilidad" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Hotel</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
