@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Crear Vuelo</h1>
    <form action="{{ route('admin.storeVuelo') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="origen" class="form-label">Origen</label>
            <input type="text" class="form-control" id="origen" name="origen" value="{{ old('origen') }}" required>
            @error('origen')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="destino" class="form-label">Destino</label>
            <input type="text" class="form-control" id="destino" name="destino" value="{{ old('destino') }}" required>
            @error('destino')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fecha_salida" class="form-label">Fecha de Salida</label>
            <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" value="{{ old('fecha_salida') }}" required>
            @error('fecha_salida')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fecha_llegada">Fecha de Llegada</label>
            <input type="date" class="form-control" id="fecha_llegada" name="fecha_llegada" value="{{ old('fecha_llegada') }}" required>
            @error('fecha_llegada')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="aerolinea">Aerolínea</label>
            <input type="text" class="form-control" id="aerolinea" name="aerolinea" value="{{ old('aerolinea') }}" required>
            @error('aerolinea')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" required>
            @error('precio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crear Vuelo</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
