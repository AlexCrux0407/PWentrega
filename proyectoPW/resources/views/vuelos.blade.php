@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5">
    <h1 class="text-center">Buscar Vuelo</h1>
    <p class="text-center lead">Encuentra el mejor vuelo para tu viaje</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center">Buscar un vuelo</h4>
                    <form action="{{ route('rutabuscarVuelo') }}" method="POST">
                        @csrf
                        <label for="origen" class="form-label">Origen</label>
                        <select id="origen" name="origen" class="form-select" required>
                            <option selected disabled>Seleccione una ciudad</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Bogotá">Bogotá</option>
                            <option value="Lima">Lima</option>
                            <option value="Ciudad de México">Ciudad de México</option>
                            <option value="Santiago">Santiago</option>
                        </select>

                        <label for="destino" class="form-label">Destino</label>
                        <select id="destino" name="destino" class="form-select" required>
                            <option selected disabled>Seleccione una ciudad</option>
                            <option value="Madrid">Madrid</option>
                            <option value="París">París</option>
                            <option value="Nueva York">Nueva York</option>
                            <option value="Tokio">Tokio</option>
                            <option value="Londres">Londres</option>
                        </select>

                        <label for="fecha_salida" class="form-label">Fecha de Salida</label>
                        <input type="date" id="fecha_salida" name="fecha_salida" class="form-control" required>

                        <label for="fecha_regreso" class="form-label">Fecha de Regreso (Opcional)</label>
                        <input type="date" id="fecha_regreso" name="fecha_regreso" class="form-control">

                        <button type="submit" class="btn btn-primary w-100 mt-3">Buscar Vuelo</button>
                    </form>
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

@if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Errores de Validación',
            html: `
                <ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif
@endsection
