@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5">
    <h1 class="text-center">Resultados de la Búsqueda de Hoteles</h1>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center">Hoteles Encontrados</h4>

                    <!-- Formulario de filtros -->
                    <form method="GET" action="{{ route('hoteles') }}">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <select class="form-control" name="categoria">
                                    <option value="">Categoría (Estrellas)</option>
                                    <option value="1">1 Estrella</option>
                                    <option value="2">2 Estrellas</option>
                                    <option value="3">3 Estrellas</option>
                                    <option value="4">4 Estrellas</option>
                                    <option value="5">5 Estrellas</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <select class="form-control" name="precio">
                                    <option value="">Precio</option>
                                    <option value="1">Menos de $100</option>
                                    <option value="2">$100 - $300</option>
                                    <option value="3">$300 - $500</option>
                                    <option value="4">Más de $500</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <select class="form-control" name="distancia">
                                    <option value="">Distancia al centro</option>
                                    <option value="1">Menos de 1 km</option>
                                    <option value="2">1 - 5 km</option>
                                    <option value="3">5 - 10 km</option>
                                    <option value="4">Más de 10 km</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="servicios" placeholder="Buscar servicios">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                            </div>
                        </div>
                    </form>

                    <!-- Botón de regreso -->
                    <div class="mb-3">
                        <a href="{{ route('hoteles') }}" class="btn btn-primary">Regresar</a>
                    </div>

                    <!-- Tabla con los resultados de los hoteles -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Hotel</th>
                                <th>Ciudad</th>
                                <th>Categoría</th>
                                <th>Precio por Noche</th>
                                <th>Disponibilidad de habitaciones</th>
                                <th>Políticas de Cancelación</th>
                                <th>Comentarios</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hoteles as $hotel)
                                <tr>
                                    <td>{{ $hotel->hotel }}</td>
                                    <td>{{ $hotel->ciudad }}</td>
                                    <td>{{ $hotel->categoria }} </td>
                                    <td>${{ number_format($hotel->precio_por_noche, 2) }} Pesos</td>
                                    <td>{{ $hotel->disponibilidad ? 'Disponible - 3 habitaciones' : 'No disponible' }}</td>
                                    <td>{{ $hotel->politicas_cancelacion ?? 'Cancelación válida antes de 72 horas.' }}</td> 
                                    <td>{{ $hotel->comentarios ?? 'Muy limpio.' }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
