@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5">
    <h1 class="text-center">Resultados de la Búsqueda de Vuelo</h1>
    <p class="text-center lead">Aquí están los resultados para tu búsqueda</p>

    <!-- Formulario de filtrado -->
    <form method="GET" action="{{ route('buscarVuelo') }}" class="mb-4">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <label for="aerolinea" class="form-label">Aerolínea</label>
                <select name="aerolinea" class="form-select">
                    <option value="">Selecciona una Aerolínea</option>
                    <option value="Aerolínea 1">Aeroméxico</option>
                    <option value="Aerolínea 2">LATAM</option>
                    <option value="Aerolínea 3">American Airlines</option>
                    <option value="Aerolínea 3">Iberia</option>
                    <option value="Aerolínea 3">United Airlines</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="precio" class="form-label">Precio</label>
                <select name="precio" class="form-select">
                    <option value="">Selecciona un Rango de Precio</option>
                    <option value="1">Menos de $100</option>
                    <option value="2">$100 - $500</option>
                    <option value="3">Más de $500</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="escalas" class="form-label">Escalas</label>
                <select name="escalas" class="form-select">
                    <option value="">Selecciona una opción</option>
                    <option value="1">Directo</option>
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

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center">Vuelos Encontrados</h4>

                    <!-- Mostrar los datos de búsqueda -->
                    <p><strong>Origen:</strong> {{ $origen }}</p>
                    <p><strong>Destino:</strong> {{ $destino }}</p>
                    <p><strong>Fecha de Salida:</strong> {{ $fecha_salida }}</p>
                    <p><strong>Fecha de Regreso:</strong> {{ $fecha_llegada ? $fecha_llegada : 'No especificada' }}</p>

                    <hr>

                    <!-- Tabla con los resultados de los vuelos -->
                    <h5 class="text-center">Vuelos Disponibles</h5>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Número de Vuelo</th>
                                <th>Aerolínea</th>
                                <th>Horario</th>
                                <th>Disponibilidad</th>
                                <th>Precio por Pasajero</th>
                                <th>Escalas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vuelos as $vuelo)
                            <tr>
                                <td>{{ $vuelo->numero_vuelo }}</td>
                                <td>{{ $vuelo->aerolinea }}</td>
                                <td>{{ $vuelo->horario }}</td>
                                <td>{{ $vuelo->Disponibles }}</td>
                                <td>${{ number_format($vuelo->precio, 2) }} USD</td>
                                <td>{{ $vuelo->escalas ? 'Directo' : '1' }}</td>
                            </tr>
                            @endforeach
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
