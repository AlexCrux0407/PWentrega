@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5">
    <h1 class="text-center">Resultados de la Búsqueda de Vuelo</h1>
    <p class="text-center lead">Aquí están los resultados para tu búsqueda</p>

    @php
        $aerolineas = [
            'Aeroméxico',
            'LATAM',
            'American Airlines',
            'Iberia',
            'United Airlines',
        ];
    @endphp

    <!-- Formulario de filtrado -->
    <form method="GET" action="{{ route('buscarVuelo') }}" class="mb-4">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <label for="aerolinea" class="form-label">Aerolínea</label>
                <select name="aerolinea" class="form-select">
                    <option value="">Selecciona una Aerolínea</option>
                    @foreach($aerolineas as $aerolinea)
                        <option value="{{ $aerolinea }}">{{ $aerolinea }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="precio" class="form-label">Precio</label>
                <select name="precio" class="form-select">
                    <option value="">Selecciona un Rango de Precio</option>
                    <option value="low">Menos de $100</option>
                    <option value="medium">$100 - $500</option>
                    <option value="high">Más de $500</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="escalas" class="form-label">Escalas</label>
                <select name="escalas" class="form-select">
                    <option value="">Selecciona una opción</option>
                    <option value="directo">Directo</option>
                    <option value="1">1 Escala</option>
                    <option value="2">2 Escalas</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="horario" class="form-label">Horario de Salida</label>
                <input type="time" name="horario" class="form-control" />
            </div>

            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary w-100">Filtrar Resultados</button>
            </div>
        </div>
    </form>

    <!-- Resultados de la búsqueda -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center">Vuelos Encontrados</h4>

                    <!-- Mostrar los datos de búsqueda -->
                    <p><strong>Origen:</strong> {{ $origen ?? 'No especificado' }}</p>
                    <p><strong>Destino:</strong> {{ $destino ?? 'No especificado' }}</p>
                    <p><strong>Fecha de Salida:</strong> {{ $fecha_salida ?? 'No especificada' }}</p>
                    <p><strong>Fecha de Regreso:</strong> {{ $fecha_llegada ?? 'No especificada' }}</p>

                    <hr>

                    <!-- Tabla con los resultados de los vuelos -->
                    <h5 class="text-center">Vuelos Disponibles</h5>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Número de Vuelo</th>
                                <th>Aerolínea</th>
                                <th>Horario</th>
                                <th>Duración</th>
                                <th>Disponibilidad</th>
                                <th>Precio por Pasajero</th>
                                <th>Escalas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vuelos as $vuelo)
                            <tr>
                                <td>{{ $vuelo->numero_vuelo }}</td>
                                <td>{{ $vuelo->aerolinea }}</td>
                                <td>{{ $vuelo->horario }}</td>
                                <td>{{ $vuelo->duracion }} horas</td>
                                <td>{{ $vuelo->disponibilidad > 0 ? 'Disponible' : 'Sin disponibilidad' }}</td>
                                <td>${{ number_format($vuelo->precio, 2) }} USD</td>
                                <td>{{ $vuelo->escalas == 0 ? 'Directo' : $vuelo->escalas . ' Escalas' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No se encontraron vuelos para los criterios seleccionados.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Botón para regresar a la búsqueda -->
                    <a href="{{ route('vuelos') }}" class="btn btn-secondary w-100 mt-3">Regresar a la Búsqueda</a>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success_vuelo'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success_vuelo') }}",
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@if(session('error_vuelo'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error_vuelo') }}",
            confirmButtonText: 'Aceptar'
        }); 
    </script>
@endif
@endsection
