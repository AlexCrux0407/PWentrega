@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <h1 class="text-center">Términos y Condiciones</h1>
    <a href="{{ route('admin.terms.create') }}" class="btn btn-primary mb-3">Crear Nuevo</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Contenido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($terms as $term)
                <tr>
                    <td>{{ $term->id }}</td>
                    <td>{!! Str::limit($term->content, 100) !!}</td>
                    <td>
                        <a href="{{ route('admin.terms.edit', $term->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.terms.delete', $term->id) }}" method="POST" style="display: inline-block;">
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
@endsection
