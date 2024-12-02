@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5">
    <h1 class="text-center">Resultados de la Búsqueda de Hoteles</h1>
    <p class="text-center lead">Encuentra el hotel ideal para tu estadía</p>

    <!-- Formulario de filtros -->
    <form action="{{ route('rutabuscarHotel') }}" method="POST">
        @csrf
        <label for="ciudad" class="form-label">Ciudad <span class="text-danger">*</span></label>
        <select id="ciudad" name="ciudad" class="form-select" required>
            <option selected disabled>Seleccione una ciudad</option>
            <option value="Lima">Lima</option>
            <option value="Bogotá">Bogotá</option>
            <option value="Ciudad de México">Ciudad de México</option>
            <option value="Buenos Aires">Buenos Aires</option>
            <option value="Santiago">Santiago</option>
        </select>

        <label for="categoria" class="form-label">Categoría (opcional)</label>
        <select id="categoria" name="categoria" class="form-select">
            <option value="">Categoría (Estrellas)</option>
            <option value="1">1 Estrella</option>
            <option value="2">2 Estrellas</option>
            <option value="3">3 Estrellas</option>
            <option value="4">4 Estrellas</option>
            <option value="5">5 Estrellas</option>
        </select>

        <label for="precio" class="form-label">Rango de Precio (opcional)</label>
        <select id="precio" name="precio" class="form-select">
            <option value="">Seleccione un Rango de Precio</option>
            <option value="1">Menos de $100</option>
            <option value="2">$100 - $300</option>
            <option value="3">$300 - $500</option>
            <option value="4">Más de $500</option>
        </select>

        <label for="distancia" class="form-label">Distancia al Centro (opcional)</label>
        <select id="distancia" name="distancia" class="form-select">
            <option value="">Seleccione la Distancia</option>
            <option value="1">Menos de 1 km</option>
            <option value="2">1 - 5 km</option>
            <option value="3">5 - 10 km</option>
            <option value="4">Más de 10 km</option>
        </select>

        <label for="servicios" class="form-label">Servicios (opcional)</label>
        <input type="text" id="servicios" name="servicios" class="form-control" placeholder="Ejemplo: wifi, piscina">

        <button type="submit" class="btn btn-primary w-100 mt-3">Buscar Hotel</button>
    </form>


    <!-- Tabla con los resultados -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center">Hoteles Encontrados</h4>
                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Nombre del Hotel</th>
                                <th>Calificación</th>
                                <th>Número de Estrellas</th>
                                <th>Precio por Noche</th>
                                <th>Disponibilidad</th>
                                <th>Fotos</th>
                                <th>Descripción</th>
                                <th>Comentarios</th>
                                <th>Políticas de Cancelación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($hoteles as $hotel)
                                <tr>
                                    <td>{{ $hotel->nombre }}</td>
                                    <td>{{ $hotel->calificacion ?? 'No disponible' }}</td>
                                    <td>{{ $hotel->categoria }}</td>
                                    <td>${{ number_format($hotel->precio_por_noche, 2) }} MXN</td>
                                    <td>{{ $hotel->disponibilidad ? $hotel->disponibilidad . ' habitaciones disponibles' : 'No disponible' }}
                                    </td>
                                    <td>
                                        <a href="{{ $hotel->fotos ?? '#' }}" target="_blank">Ver Fotos</a>
                                    </td>
                                    <td>{{ $hotel->descripcion ?? 'No especificada' }}</td>
                                    <td>{{ $hotel->comentarios ?? 'No hay comentarios disponibles' }}</td>
                                    <td>{{ $hotel->politicas_cancelacion ?? 'No especificadas' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No se encontraron hoteles para los criterios
                                        seleccionados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('hoteles') }}" class="btn btn-secondary w-100 mt-3">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection