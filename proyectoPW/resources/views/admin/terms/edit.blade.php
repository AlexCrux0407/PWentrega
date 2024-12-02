@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Editar Términos y Condiciones</h1>
    <form action="{{ route('admin.terms.update', $term->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea class="form-control" id="content" name="content" rows="6" required>{{ $term->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.terms.list') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
