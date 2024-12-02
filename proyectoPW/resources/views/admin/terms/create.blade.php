@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Crear Términos y Condiciones</h1>
    <form action="{{ route('admin.terms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('admin.terms.list') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
