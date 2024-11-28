@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Editar Vuelo</h1>
    <form action="{{ route('admin.updateVuelo', $vuelo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="origen" class="form-label">Origen</label>
            <input type="text" class="form-control" id="origen" name="origen" value="{{ $vuelo->origen }}" required>
        </div>
        <div class="mb-3">
            <label for="destino" class="form-label">Destino</label>
            <input type="text" class="form-control" id="destino" name="destino" value="{{ $vuelo->destino }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_salida" class="form-label">Fecha de Salida</label>
            <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" value="{{ $vuelo->fecha_salida }}" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ $vuelo->precio }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Vuelo</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
