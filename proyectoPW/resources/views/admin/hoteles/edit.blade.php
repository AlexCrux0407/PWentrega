--@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <h2>Editar Hotel</h2>
    <form action="{{ route('admin.updateHotel', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $hotel->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ $hotel->ciudad }}" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" id="categoria" class="form-select" required>
                <option value="1 estrella" {{ $hotel->categoria === '1 estrella' ? 'selected' : '' }}>1 estrella</option>
                <option value="2 estrellas" {{ $hotel->categoria === '2 estrellas' ? 'selected' : '' }}>2 estrellas</option>
                <option value="3 estrellas" {{ $hotel->categoria === '3 estrellas' ? 'selected' : '' }}>3 estrellas</option>
                <option value="4 estrellas" {{ $hotel->categoria === '4 estrellas' ? 'selected' : '' }}>4 estrellas</option>
                <option value="5 estrellas" {{ $hotel->categoria === '5 estrellas' ? 'selected' : '' }}>5 estrellas</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="precio_por_noche" class="form-label">Precio por Noche</label>
            <input type="number" name="precio_por_noche" id="precio_por_noche" class="form-control" step="0.01" value="{{ $hotel->precio_por_noche }}" required>
        </div>
        <div class="mb-3">
            <label for="disponibilidad" class="form-label">Disponibilidad</label>
            <input type="number" name="disponibilidad" id="disponibilidad" class="form-control" value="{{ $hotel->disponibilidad }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
